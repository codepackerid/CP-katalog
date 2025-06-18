<?php
// Script untuk mengecek permission storage directory

echo "<h1>Storage Directory Permissions Check</h1>";
echo "<pre>";

// Cek storage directory
$storageDir = __DIR__ . '/storage';
echo "Storage directory: $storageDir\n";
echo "Exists: " . (file_exists($storageDir) ? "Yes" : "No") . "\n";
echo "Readable: " . (is_readable($storageDir) ? "Yes" : "No") . "\n";
echo "Writable: " . (is_writable($storageDir) ? "Yes" : "No") . "\n";
echo "Permissions: " . substr(sprintf('%o', fileperms($storageDir)), -4) . "\n\n";

// Cek storage/app/public directory
$publicDir = $storageDir . '/app/public';
echo "Public directory: $publicDir\n";
echo "Exists: " . (file_exists($publicDir) ? "Yes" : "No") . "\n";
if (file_exists($publicDir)) {
    echo "Readable: " . (is_readable($publicDir) ? "Yes" : "No") . "\n";
    echo "Writable: " . (is_writable($publicDir) ? "Yes" : "No") . "\n";
    echo "Permissions: " . substr(sprintf('%o', fileperms($publicDir)), -4) . "\n\n";
}

// Cek storage/app/public/projects directory
$projectsDir = $publicDir . '/projects';
echo "Projects directory: $projectsDir\n";
if (!file_exists($projectsDir)) {
    echo "Directory does not exist, creating...\n";
    try {
        mkdir($projectsDir, 0755, true);
        echo "Created successfully.\n";
    } catch (Exception $e) {
        echo "Failed to create directory: " . $e->getMessage() . "\n";
    }
}
echo "Exists: " . (file_exists($projectsDir) ? "Yes" : "No") . "\n";
if (file_exists($projectsDir)) {
    echo "Readable: " . (is_readable($projectsDir) ? "Yes" : "No") . "\n";
    echo "Writable: " . (is_writable($projectsDir) ? "Yes" : "No") . "\n";
    echo "Permissions: " . substr(sprintf('%o', fileperms($projectsDir)), -4) . "\n\n";
}

// Cek public/storage symlink
$publicStorageLink = __DIR__ . '/public/storage';
echo "Public storage symlink: $publicStorageLink\n";
echo "Exists: " . (file_exists($publicStorageLink) ? "Yes" : "No") . "\n";
if (file_exists($publicStorageLink)) {
    echo "Is symlink: " . (is_link($publicStorageLink) ? "Yes" : "No") . "\n";
    echo "Target: " . readlink($publicStorageLink) . "\n";
} else {
    echo "Symlink does not exist. Run 'php artisan storage:link' to create it.\n";
}

// Test file creation
if (is_writable($projectsDir)) {
    $testFile = $projectsDir . '/test.txt';
    echo "\nTesting file creation in projects directory...\n";
    try {
        file_put_contents($testFile, "This is a test file to check write permissions");
        echo "Test file created successfully at $testFile\n";
        unlink($testFile);
        echo "Test file removed successfully\n";
    } catch (Exception $e) {
        echo "Failed to create/remove test file: " . $e->getMessage() . "\n";
    }
}

echo "</pre>"; 