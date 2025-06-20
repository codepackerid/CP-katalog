<?php

// Bootstrapping Laravel
require __DIR__ . '/vendor/autoload.php';

// The application instance
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

// Use Facades directly
use Illuminate\Support\Facades\DB;
use App\Models\Project;

// Handle CSRF for Laravel
if (isset($_POST['_token'])) {
    // We're running inside Laravel's context so we should be good
} else {
    // For direct form submission without token
    $_POST['_token'] = csrf_token();
}

// CSS for basic styling
echo '<style>
body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
h1, h2, h3 { margin-top: 20px; }
table { border-collapse: collapse; width: 100%; }
table, th, td { border: 1px solid #ddd; }
th, td { padding: 12px; text-align: left; }
input[type="text"], input[type="url"] { width: 100%; padding: 8px; box-sizing: border-box; }
input[type="submit"], button { padding: 8px 16px; background: #4CAF50; color: white; border: none; cursor: pointer; }
input[type="submit"]:hover, button:hover { background: #45a049; }
.screenshot-preview { max-width: 200px; max-height: 150px; }
.error { color: red; }
.success { color: green; }
</style>';

// Page title
echo '<h1>Direct Screenshot Manager</h1>';

// Get project ID from request or use default
$projectId = $_REQUEST['project_id'] ?? null;

// Project selection form
echo '<form method="GET">';
echo '<label for="project_id">Select Project ID:</label> ';
echo '<input type="number" name="project_id" id="project_id" value="' . htmlspecialchars($projectId ?? '') . '" min="1" required> ';
echo '<input type="submit" value="Load Project">';
echo '</form>';

// Process project update
if ($projectId) {
    try {
        $project = Project::findOrFail($projectId);
        
        echo '<h2>Managing Screenshots for Project: ' . htmlspecialchars($project->title) . '</h2>';
        
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $action = $_POST['action'] ?? '';
            
            switch ($action) {
                case 'add':
                    $url = $_POST['screenshot_url'] ?? '';
                    if (!empty($url)) {
                        $screenshots = $project->screenshots ?? [];
                        $screenshots[] = $url;
                        $project->screenshots = $screenshots;
                        $project->save();
                        echo '<p class="success">Screenshot added successfully!</p>';
                    }
                    break;
                    
                case 'update':
                    $screenshots = isset($_POST['screenshots']) ? array_filter($_POST['screenshots']) : [];
                    $project->screenshots = $screenshots;
                    $project->save();
                    echo '<p class="success">Screenshots updated successfully!</p>';
                    break;
                    
                case 'remove':
                    $index = isset($_POST['index']) ? (int)$_POST['index'] : null;
                    if ($index !== null) {
                        $screenshots = $project->screenshots ?? [];
                        if (isset($screenshots[$index])) {
                            array_splice($screenshots, $index, 1);
                            $project->screenshots = $screenshots;
                            $project->save();
                            echo '<p class="success">Screenshot removed successfully!</p>';
                        }
                    }
                    break;
            }
        }
        
        // Get current screenshots
        $screenshots = $project->screenshots ?? [];
        
        // Display current screenshots
        echo '<h3>Current Screenshots</h3>';
        
        if (empty($screenshots)) {
            echo '<p>No screenshots available for this project.</p>';
        } else {
            echo '<table>';
            echo '<tr><th>#</th><th>Preview</th><th>URL</th><th>Action</th></tr>';
            
            foreach ($screenshots as $index => $url) {
                echo '<tr>';
                echo '<td>' . ($index + 1) . '</td>';
                echo '<td><img src="' . htmlspecialchars($url) . '" class="screenshot-preview" alt="Screenshot ' . ($index + 1) . '"></td>';
                echo '<td>' . htmlspecialchars($url) . '</td>';
                echo '<td>
                    <form method="POST">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="action" value="remove">
                        <input type="hidden" name="index" value="' . $index . '">
                        <input type="submit" name="submit" value="Remove" onclick="return confirm(\'Are you sure?\');">
                    </form>
                </td>';
                echo '</tr>';
            }
            
            echo '</table>';
        }
        
        // Add new screenshot form
        echo '<h3>Add New Screenshot</h3>';
        echo '<form method="POST">';
        echo '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        echo '<input type="hidden" name="action" value="add">';
        echo '<input type="url" name="screenshot_url" placeholder="Enter screenshot URL" required>';
        echo '<input type="submit" name="submit" value="Add Screenshot">';
        echo '</form>';
        
        // Update all screenshots form
        echo '<h3>Update All Screenshots</h3>';
        echo '<form method="POST">';
        echo '<input type="hidden" name="_token" value="' . csrf_token() . '">';
        echo '<input type="hidden" name="action" value="update">';
        
        echo '<table>';
        
        // Always show at least 5 inputs
        $count = max(count($screenshots), 5);
        
        for ($i = 0; $i < $count; $i++) {
            $url = $screenshots[$i] ?? '';
            echo '<tr>';
            echo '<td>' . ($i + 1) . '</td>';
            echo '<td><input type="url" name="screenshots[]" value="' . htmlspecialchars($url) . '" placeholder="Screenshot URL"></td>';
            echo '</tr>';
        }
        
        echo '</table>';
        
        echo '<input type="submit" name="submit" value="Update All Screenshots">';
        echo '</form>';
        
    } catch (\Exception $e) {
        echo '<p class="error">Error: ' . $e->getMessage() . '</p>';
    }
}

// Link back to projects
echo '<p><a href="/projects">Back to Projects</a></p>';
