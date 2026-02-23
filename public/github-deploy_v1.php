<?php
/**
 * GitHub to DirectAdmin Auto-Deploy (No SSH Required)
 * Webhook URL: https://enamux.com/github-deploy.php
 */

// ============================================
// CONFIGURATION
// ============================================

define('GITHUB_USERNAME', 'PeterAdetola');
define('GITHUB_REPO', 'enamux');
define('GITHUB_BRANCH', 'main');
define('WEBHOOK_SECRET', '58333e2ba0d4e3b0260dad1aa18111605e367a49fa3e2f6bc11974341926cc88');

// DirectAdmin paths - CORRECTED
define('APP_ROOT', '/home/jupiterc/domains/enamux.com/enamux_laravel');
define('PUBLIC_ROOT', '/home/jupiterc/domains/enamux.com/public_html');
define('TEMP_DIR', sys_get_temp_dir());
define('LOG_FILE', APP_ROOT . '/storage/logs/deploy.log');

// Files/folders to preserve (won't be overwritten)
$PRESERVE_PATHS = [
    'public/uploads',
    'public/projects',
    '.env',
    'storage/logs',
];

// ============================================
// FUNCTIONS
// ============================================

function logMessage($message) {
    $timestamp = date('Y-m-d H:i:s');
    $logDir = dirname(LOG_FILE);

    if (!is_dir($logDir)) {
        @mkdir($logDir, 0755, true);
    }

    @file_put_contents(LOG_FILE, "[$timestamp] $message\n", FILE_APPEND);
}

function verifySignature($payload, $signature) {
    if (!$signature) {
        return false;
    }

    if (strpos($signature, '=') === false) {
        return false;
    }

    list($algo, $hash) = explode('=', $signature, 2);
    $payloadHash = hash_hmac($algo, $payload, WEBHOOK_SECRET);

    return hash_equals($hash, $payloadHash);
}

function downloadFromGitHub() {
    $zipUrl = sprintf(
        'https://github.com/%s/%s/archive/refs/heads/%s.zip',
        GITHUB_USERNAME,
        GITHUB_REPO,
        GITHUB_BRANCH
    );

    logMessage("Downloading from: $zipUrl");

    $zipFile = TEMP_DIR . '/github-repo-' . time() . '.zip';

    $ch = curl_init($zipUrl);
    $fp = fopen($zipFile, 'w');

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 300);

    $success = curl_exec($ch);
    $error = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    fclose($fp);

    if (!$success || $httpCode !== 200) {
        throw new Exception("Failed to download (HTTP $httpCode): $error");
    }

    if (!file_exists($zipFile) || filesize($zipFile) < 1000) {
        throw new Exception("Downloaded file is invalid or too small");
    }

    logMessage("Download complete: " . filesize($zipFile) . " bytes");

    return $zipFile;
}

function extractZip($zipFile) {
    $extractPath = TEMP_DIR . '/github-extract-' . time();

    logMessage("Extracting to: $extractPath");

    $zip = new ZipArchive();

    if ($zip->open($zipFile) !== true) {
        throw new Exception("Failed to open ZIP file");
    }

    $zip->extractTo($extractPath);
    $zip->close();

    $dirs = glob($extractPath . '/*', GLOB_ONLYDIR);

    if (empty($dirs)) {
        throw new Exception("No directory found in extracted ZIP");
    }

    $repoFolder = $dirs[0];
    logMessage("Repository extracted to: $repoFolder");

    return $repoFolder;
}

function backupPreservedFiles($preservePaths) {
    $backups = [];

    foreach ($preservePaths as $path) {
        $fullPath = APP_ROOT . '/' . $path;

        if (file_exists($fullPath)) {
            $backupPath = TEMP_DIR . '/backup-' . md5($path) . '-' . time();

            if (is_dir($fullPath)) {
                recursiveCopy($fullPath, $backupPath);
            } else {
                @copy($fullPath, $backupPath);
            }

            $backups[$path] = $backupPath;
            logMessage("Backed up: $path");
        }
    }

    return $backups;
}

function restorePreservedFiles($backups) {
    foreach ($backups as $originalPath => $backupPath) {
        $fullPath = APP_ROOT . '/' . $originalPath;

        $parentDir = dirname($fullPath);
        if (!is_dir($parentDir)) {
            @mkdir($parentDir, 0755, true);
        }

        if (file_exists($backupPath)) {
            if (is_dir($backupPath)) {
                recursiveCopy($backupPath, $fullPath);
            } else {
                @copy($backupPath, $fullPath);
            }
            logMessage("Restored: $originalPath");
        } else {
            logMessage("WARNING: Backup not found for: $originalPath");
        }
    }
}

function recursiveCopy($src, $dst) {
    $dir = @opendir($src);
    if (!$dir) return;

    @mkdir($dst, 0755, true);

    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            if (is_dir($src . '/' . $file)) {
                recursiveCopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                @copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }

    closedir($dir);
}

function recursiveDelete($dir) {
    if (!is_dir($dir)) {
        return;
    }

    $files = array_diff(scandir($dir), ['.', '..']);

    foreach ($files as $file) {
        $path = $dir . '/' . $file;
        is_dir($path) ? recursiveDelete($path) : @unlink($path);
    }

    @rmdir($dir);
}

function fixPermissions() {
    logMessage("Fixing permissions...");

    $dirs = [
        APP_ROOT . '/storage',
        APP_ROOT . '/storage/logs',
        APP_ROOT . '/storage/framework',
        APP_ROOT . '/storage/framework/cache',
        APP_ROOT . '/storage/framework/sessions',
        APP_ROOT . '/storage/framework/views',
        APP_ROOT . '/bootstrap/cache',
    ];

    foreach ($dirs as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
            logMessage("Created: $dir");
        }
        @chmod($dir, 0775);
    }

    if (file_exists(APP_ROOT . '/.env')) {
        @chmod(APP_ROOT . '/.env', 0644);
    }

    logMessage("Permissions fixed");
}

function clearLaravelCache() {
    logMessage("Clearing Laravel caches...");

    $caches = [
        APP_ROOT . '/bootstrap/cache/config.php',
        APP_ROOT . '/bootstrap/cache/routes-v7.php',
        APP_ROOT . '/bootstrap/cache/services.php',
        APP_ROOT . '/bootstrap/cache/packages.php',
    ];

    foreach ($caches as $cache) {
        if (file_exists($cache)) {
            @unlink($cache);
            logMessage("Cleared: " . basename($cache));
        }
    }

    // Clear view cache
    $viewPath = APP_ROOT . '/storage/framework/views';
    if (is_dir($viewPath)) {
        $files = glob($viewPath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
        logMessage("Cleared view cache");
    }

    // Clear compiled cache
    $cachePath = APP_ROOT . '/storage/framework/cache/data';
    if (is_dir($cachePath)) {
        $dirs = glob($cachePath . '/*', GLOB_ONLYDIR);
        foreach ($dirs as $dir) {
            $files = glob($dir . '/*');
            foreach ($files as $file) {
                if (is_file($file)) {
                    @unlink($file);
                }
            }
        }
        logMessage("Cleared data cache");
    }

    logMessage("Laravel caches cleared");
}

function deployCode($repoFolder, $preservePaths) {
    global $PRESERVE_PATHS;

    logMessage("Starting deployment...");

    // Backup preserved files
    $backups = backupPreservedFiles($PRESERVE_PATHS);

    // Copy new code to app directory
    logMessage("Copying new code to: " . APP_ROOT);
    recursiveCopy($repoFolder, APP_ROOT);

    // Restore preserved files
    restorePreservedFiles($backups);

    // Fix permissions
    fixPermissions();

    // Sync public directory - SIMPLIFIED
    logMessage("Syncing public directory...");

    $publicSource = APP_ROOT . '/public';

    if (is_dir($publicSource)) {
        // Just copy everything as-is (no path replacement needed!)
        $publicFiles = array_diff(scandir($publicSource), ['.', '..']);

        foreach ($publicFiles as $file) {
            if ($file === 'uploads' || $file === 'projects') {
                continue; // Skip preserved folders
            }

            $src = $publicSource . '/' . $file;
            $dst = PUBLIC_ROOT . '/' . $file;

            if (is_dir($src)) {
                recursiveCopy($src, $dst);
            } else {
                @copy($src, $dst);
            }
        }

        logMessage("Public directory synced");
    }

    // Clean up backups
    foreach ($backups as $backupPath) {
        if (is_dir($backupPath)) {
            recursiveDelete($backupPath);
        } else {
            @unlink($backupPath);
        }
    }

    logMessage("Deployment complete!");
}

// ============================================
// MAIN EXECUTION
// ============================================

header('Content-Type: application/json');

// Test endpoint
if (isset($_GET['test'])) {
    echo json_encode([
        'status' => 'ok',
        'message' => 'Deployment script is ready',
        'app_root' => APP_ROOT,
        'public_root' => PUBLIC_ROOT,
        'timestamp' => date('Y-m-d H:i:s')
    ]);
    exit;
}

try {
    logMessage("=== Webhook received ===");

    $payload = file_get_contents('php://input');
    $headers = array_change_key_case(getallheaders(), CASE_LOWER);

    // Verify signature
    $signature = $headers['x-hub-signature-256'] ?? null;

    if (!verifySignature($payload, $signature)) {
        http_response_code(401);
        logMessage("ERROR: Invalid signature");
        echo json_encode(['error' => 'Unauthorized']);
        exit;
    }

    $data = json_decode($payload, true);

    if (!$data) {
        http_response_code(400);
        logMessage("ERROR: Invalid JSON payload");
        echo json_encode(['error' => 'Invalid payload']);
        exit;
    }

    $event = $headers['x-github-event'] ?? '';

    if ($event !== 'push') {
        logMessage("INFO: Ignoring event: $event");
        echo json_encode(['message' => 'Not a push event']);
        exit;
    }

    $branch = str_replace('refs/heads/', '', $data['ref'] ?? '');
    logMessage("Push to branch: $branch");

    if ($branch !== GITHUB_BRANCH) {
        logMessage("INFO: Ignoring branch: $branch");
        echo json_encode(['message' => 'Not target branch']);
        exit;
    }

    // Send immediate response to GitHub
    echo json_encode([
        'status' => 'accepted',
        'message' => 'Deployment started',
        'timestamp' => date('Y-m-d H:i:s')
    ]);

    // Flush output
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    } else {
        ob_end_flush();
        flush();
    }

    // Now deploy
    $zipFile = downloadFromGitHub();
    $repoFolder = extractZip($zipFile);
    deployCode($repoFolder, $PRESERVE_PATHS);

    // Clear Laravel caches
    clearLaravelCache();

    // Cleanup
    @unlink($zipFile);
    recursiveDelete(dirname($repoFolder));

    logMessage("✅ Deployment successful!");

} catch (Exception $e) {
    logMessage("EXCEPTION: " . $e->getMessage());
    logMessage("Stack trace: " . $e->getTraceAsString());

    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
