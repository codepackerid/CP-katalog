<?php

// File untuk debugging data project
// Simpan file ini di root project dan akses melalui http://localhost/codepacker-net/debug_output.php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Autentikasi manual jika diperlukan
if ($userId = intval($_GET['user_id'] ?? 0)) {
    Auth::loginUsingId($userId);
}

// Debugging output
echo '<h1>Debug Project Data</h1>';
echo '<pre>';

try {
    // Tampilkan semua project
    $projects = \App\Models\Project::with('user')->get();
    echo "Total projects: " . $projects->count() . "\n\n";
    
    if ($projects->count() > 0) {
        foreach ($projects as $project) {
            echo "ID: " . $project->id . "\n";
            echo "Title: " . $project->title . "\n";
            echo "User ID: " . $project->user_id . " (User: " . ($project->user ? $project->user->name : 'User tidak ditemukan') . ")\n";
            echo "Status: " . $project->status . "\n";
            echo "Technologies: " . json_encode($project->technologies) . "\n";
            echo "Created at: " . $project->created_at . "\n";
            echo "Updated at: " . $project->updated_at . "\n";
            echo "------------------------------------------------\n";
        }
    } else {
        echo "Tidak ada project yang ditemukan di database.\n";
    }
    
    // Cek struktur tabel projects
    $columns = \DB::select('SHOW COLUMNS FROM projects');
    echo "\nStruktur tabel projects:\n";
    foreach ($columns as $column) {
        echo $column->Field . " - " . $column->Type . " - " . $column->Null . " - " . $column->Default . "\n";
    }
    
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}

echo '</pre>'; 