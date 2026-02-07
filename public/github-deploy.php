<?php
/**
 * GitHub to DirectAdmin Auto-Deploy (No SSH Required)
 * Place this at: public_html/github-deploy.php
 *
 * How it works:
 * 1. GitHub webhook sends notification
 * 2. This script downloads latest code as ZIP from GitHub
 * 3. Extracts to correct location
 * 4. Updates your site automatically
 *
 * Webhook URL: https://enamux.com/github-deploy.php
 */

// ============================================
// CONFIGURATION - EDIT THESE VALUES
// ============================================

define('GITHUB_USERNAME', 'PeterAdetola');
define('GITHUB_REPO', 'enamux');
define('GITHUB_BRANCH', 'main'); // or 'master'
define('WEBHOOK_SECRET', '58333e2ba0d4e3b0260dad1aa18111605e367a49fa3e2f6bc11974341926cc88'); // Generate with: openssl rand -hex 32

// DirectAdmin paths
// When script is in public/ folder of Laravel app:
define('APP_ROOT', dirname(__DIR__)); // Goes up one level from public/ to Laravel root
define('PUBLIC_ROOT', __DIR__); // Current directory is public_html
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
        mkdir($logDir, 0755, true);
    }

    file_put_contents(LOG_FILE, "[$timestamp] $message\n", FILE_APPEND);
}

function verifySignature($payload, $signature) {
    if (!$signature) {
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

    $zipFile = TEMP_DIR . '/github-repo.zip';

    // Download with curl
    $ch = curl_init($zipUrl);
    $fp = fopen($zipFile, 'w');

    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $success = curl_exec($ch);
    $error = curl_error($ch);

    curl_close($ch);
    fclose($fp);

    if (!$success) {
        throw new Exception("Failed to download: $error");
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

    // GitHub zips have a root folder like "repo-main"
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
                copy($fullPath, $backupPath);
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

        if (is_dir($backupPath)) {
            recursiveCopy($backupPath, $fullPath);
        } else {
            copy($backupPath, $fullPath);
        }

        logMessage("Restored: $originalPath");
    }
}

function recursiveCopy($src, $dst) {
    $dir = opendir($src);
    @mkdir($dst, 0755, true);

    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            if (is_dir($src . '/' . $file)) {
                recursiveCopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
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
        is_dir($path) ? recursiveDelete($path) : unlink($path);
    }

    rmdir($dir);
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

    // Sync public directory
    logMessage("Syncing public directory...");

    $publicSource = APP_ROOT . '/public';

    if (is_dir($publicSource)) {
        // First, copy index.php with corrected paths
        $indexContent = file_get_contents($publicSource . '/index.php');

        // Replace paths to point to enamux_laravel
        $indexContent = str_replace(
            "require __DIR__.'/../vendor/autoload.php'",
            "require __DIR__.'/../enamux_laravel/vendor/autoload.php'",
            $indexContent
        );
        $indexContent = str_replace(
            "require_once __DIR__.'/../bootstrap/app.php'",
            "require_once __DIR__.'/../enamux_laravel/bootstrap/app.php'",
            $indexContent
        );
        $indexContent = str_replace(
            "__DIR__.'/../storage/framework/maintenance.php'",
            "__DIR__.'/../enamux_laravel/storage/framework/maintenance.php'",
            $indexContent
        );

        file_put_contents(PUBLIC_ROOT . '/index.php', $indexContent);
        logMessage("Updated index.php with correct paths");

        // Now copy other public files
        $publicFiles = array_diff(scandir($publicSource), ['.', '..', 'index.php']);

        foreach ($publicFiles as $file) {
            if ($file === 'uploads' || $file === 'projects') {
                continue;
            }

            $src = $publicSource . '/' . $file;
            $dst = PUBLIC_ROOT . '/' . $file;

            if (is_dir($src)) {
                recursiveCopy($src, $dst);
            } else {
                @copy($src, $dst);
            }
        }
    }

    // Clean up backups
    foreach ($backups as $backupPath) {
        if (is_dir($backupPath)) {
            recursiveDelete($backupPath);
        } else {
            unlink($backupPath);
        }
    }

    logMessage("Deployment complete!");
}

// ============================================
// MAIN EXECUTION
// ============================================

header('Content-Type: application/json');

try {
    logMessage("=== Webhook received ===");

    // Get payload
    $payload = file_get_contents('php://input');
    $headers = getallheaders();

    // Verify signature
    $signature = $headers['X-Hub-Signature-256'] ?? $headers['x-hub-signature-256'] ?? null;

    if (!verifySignature($payload, $signature)) {
        http_response_code(401);
        logMessage("ERROR: Invalid signature");
        die(json_encode(['error' => 'Unauthorized']));
    }

    // Parse payload
    $data = json_decode($payload, true);

    if (!$data) {
        http_response_code(400);
        logMessage("ERROR: Invalid JSON");
        die(json_encode(['error' => 'Invalid payload']));
    }

    // Check event type
    $event = $headers['X-GitHub-Event'] ?? $headers['x-github-event'] ?? '';

    if ($event !== 'push') {
        logMessage("INFO: Ignoring event: $event");
        http_response_code(200);
        die(json_encode(['message' => 'Not a push event']));
    }

    // Check branch
    $branch = str_replace('refs/heads/', '', $data['ref'] ?? '');
    logMessage("Push to branch: $branch");

    if ($branch !== GITHUB_BRANCH) {
        logMessage("INFO: Ignoring branch: $branch");
        http_response_code(200);
        die(json_encode(['message' => 'Not target branch']));
    }

    // Download latest code
    $zipFile = downloadFromGitHub();

    // Extract
    $repoFolder = extractZip($zipFile);

    // Deploy
    deployCode($repoFolder, $PRESERVE_PATHS);

    // Cleanup
    unlink($zipFile);
    recursiveDelete(dirname($repoFolder));

    logMessage("✅ Deployment successful!");

    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'message' => 'Deployment completed successfully',
        'timestamp' => date('Y-m-d H:i:s')
    ]);

} catch (Exception $e) {
    logMessage("EXCEPTION: " . $e->getMessage());
    logMessage("Stack trace: " . $e->getTraceAsString());

    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}
