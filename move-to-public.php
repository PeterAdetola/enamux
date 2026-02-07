<?php

// Run: php move-to-public.php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=================================\n";
echo "Moving Projects to Public Folder\n";
echo "=================================\n\n";

$sourceDir = storage_path('app/projects');
$publicDir = public_path('projects');

if (!is_dir($sourceDir)) {
    echo "❌ Source directory not found: $sourceDir\n";
    exit;
}

if (!is_dir($publicDir)) {
    echo "Creating public/projects directory...\n";
    mkdir($publicDir, 0755, true);
}

// Copy all projects
$projects = scandir($sourceDir);
foreach ($projects as $project) {
    if ($project === '.' || $project === '..') continue;

    $sourcePath = $sourceDir . '/' . $project;
    $destPath = $publicDir . '/' . $project;

    if (is_dir($sourcePath)) {
        echo "\nCopying project: $project\n";
        copyDirectory($sourcePath, $destPath);
        echo "✓ $project copied successfully\n";
    }
}

echo "\n=================================\n";
echo "✓ All projects moved to public/projects/\n";
echo "=================================\n\n";

echo "Your images are now accessible at:\n";
echo "http://yoursite.com/projects/042_arena/images/...\n\n";

echo "No symlink needed!\n";

function copyDirectory($src, $dst) {
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }

    $dir = opendir($src);
    while (($file = readdir($dir)) !== false) {
        if ($file != '.' && $file != '..') {
            $srcPath = $src . '/' . $file;
            $dstPath = $dst . '/' . $file;

            if (is_dir($srcPath)) {
                copyDirectory($srcPath, $dstPath);
            } else {
                copy($srcPath, $dstPath);
            }
        }
    }
    closedir($dir);
}
