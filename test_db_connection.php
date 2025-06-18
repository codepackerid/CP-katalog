<?php

// Script untuk menguji koneksi database dan struktur tabel projects

// Bootstrap Laravel app
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "<h1>Database Connection Test</h1>";
echo "<pre>";

// 1. Cek koneksi database
try {
    $connection = DB::connection()->getPdo();
    echo "Database terkoneksi: " . DB::connection()->getDatabaseName() . "\n\n";
} catch (\Exception $e) {
    die("Error koneksi database: " . $e->getMessage() . "\n");
}

// 2. Cek apakah tabel projects ada
try {
    $tables = DB::select("SHOW TABLES");
    echo "Daftar tabel dalam database:\n";
    foreach ($tables as $table) {
        $tableName = reset($table);
        echo "- " . $tableName . "\n";
    }
    echo "\n";
} catch (\Exception $e) {
    echo "Error saat memeriksa tabel: " . $e->getMessage() . "\n";
}

// 3. Cek struktur tabel projects
try {
    $columns = DB::select("SHOW COLUMNS FROM projects");
    echo "Struktur tabel projects:\n";
    echo str_pad("Field", 20) . str_pad("Type", 20) . str_pad("Null", 10) . str_pad("Key", 10) . str_pad("Default", 10) . "Extra\n";
    echo str_repeat("-", 80) . "\n";
    
    foreach ($columns as $column) {
        echo str_pad($column->Field, 20) . str_pad($column->Type, 20) . str_pad($column->Null, 10) . str_pad($column->Key, 10) . str_pad($column->Default ?? 'NULL', 10) . $column->Extra . "\n";
    }
    echo "\n";
} catch (\Exception $e) {
    echo "Error saat memeriksa struktur tabel projects: " . $e->getMessage() . "\n";
}

// 4. Coba insert data dummy ke tabel projects
try {
    echo "Mencoba insert data dummy ke tabel projects...\n";
    
    // Check if user with ID 1 exists
    $user = DB::table('users')->where('id', 1)->first();
    if (!$user) {
        echo "User dengan ID 1 tidak ditemukan, tidak bisa melanjutkan insert!\n";
    } else {
        // Insert data dummy
        $projectId = DB::table('projects')->insertGetId([
            'title' => 'Test Project ' . time(),
            'description' => 'Ini adalah project test untuk debugging',
            'user_id' => 1,
            'status' => 'published',
            'technologies' => json_encode(['PHP', 'Laravel']),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        echo "Data berhasil diinsert dengan ID: " . $projectId . "\n\n";
        
        // Verifikasi data yang diinsert
        $project = DB::table('projects')->where('id', $projectId)->first();
        if ($project) {
            echo "Data berhasil diverifikasi:\n";
            foreach ((array)$project as $key => $value) {
                echo "- $key: " . (is_string($value) ? $value : json_encode($value)) . "\n";
            }
        } else {
            echo "Data tidak ditemukan setelah insert!\n";
        }
    }
} catch (\Exception $e) {
    echo "Error saat mencoba insert data: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}

echo "</pre>"; 