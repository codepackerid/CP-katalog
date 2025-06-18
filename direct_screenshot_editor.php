<?php

// Bootstrapping Laravel in a standalone script
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Now we can use Laravel models, facades, etc.
use App\Models\Project;

/**
 * Simple class for direct screenshot manipulation via code
 */
class ProjectScreenshotManager
{
    /**
     * Add a screenshot URL to a project
     */
    public static function addScreenshot(int $projectId, string $screenshotUrl): bool
    {
        try {
            $project = Project::findOrFail($projectId);
            $screenshots = $project->screenshots ?? [];
            $screenshots[] = $screenshotUrl;
            $project->screenshots = $screenshots;
            $project->save();
            
            echo "Screenshot added to project {$project->title}\n";
            return true;
        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";
            return false;
        }
    }
    
    /**
     * Update all screenshots for a project
     */
    public static function updateScreenshots(int $projectId, array $screenshotUrls): bool
    {
        try {
            $project = Project::findOrFail($projectId);
            $project->screenshots = $screenshotUrls;
            $project->save();
            
            echo "Screenshots updated for project {$project->title}\n";
            return true;
        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";
            return false;
        }
    }
    
    /**
     * Remove a screenshot at a specific index
     */
    public static function removeScreenshot(int $projectId, int $index): bool
    {
        try {
            $project = Project::findOrFail($projectId);
            $screenshots = $project->screenshots ?? [];
            
            if (isset($screenshots[$index])) {
                array_splice($screenshots, $index, 1);
                $project->screenshots = $screenshots;
                $project->save();
                
                echo "Screenshot removed from project {$project->title}\n";
                return true;
            } else {
                echo "Screenshot index not found\n";
                return false;
            }
        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";
            return false;
        }
    }
    
    /**
     * Get all screenshots for a project
     */
    public static function getScreenshots(int $projectId): array
    {
        try {
            $project = Project::findOrFail($projectId);
            return $project->screenshots ?? [];
        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";
            return [];
        }
    }
    
    /**
     * List all screenshots for a project
     */
    public static function listScreenshots(int $projectId): void
    {
        try {
            $project = Project::findOrFail($projectId);
            $screenshots = $project->screenshots ?? [];
            
            echo "Screenshots for project '{$project->title}' (ID: $projectId):\n";
            
            if (empty($screenshots)) {
                echo "  No screenshots found.\n";
                return;
            }
            
            foreach ($screenshots as $index => $url) {
                echo "  [$index] $url\n";
            }
        } catch (\Exception $e) {
            echo "Error: {$e->getMessage()}\n";
        }
    }
}

// Example usage - MODIFY THESE VALUES TO MANAGE YOUR PROJECT'S SCREENSHOTS

// Project ID you want to modify
$projectId = 1; // Change this to your project ID

// Action to perform: 'list', 'add', 'remove', 'update'
$action = 'list'; // Change this to the action you want

// For 'add' action - URL of the screenshot to add
$screenshotUrl = 'https://example.com/screenshot.png';

// For 'update' action - New list of screenshot URLs
$screenshotUrls = [
    'https://example.com/screenshot1.png',
    'https://example.com/screenshot2.png',
    // Add more URLs as needed
];

// For 'remove' action - Index of the screenshot to remove
$screenshotIndex = 0;

// Execute the action
switch ($action) {
    case 'list':
        ProjectScreenshotManager::listScreenshots($projectId);
        break;
        
    case 'add':
        ProjectScreenshotManager::addScreenshot($projectId, $screenshotUrl);
        break;
        
    case 'remove':
        ProjectScreenshotManager::removeScreenshot($projectId, $screenshotIndex);
        break;
        
    case 'update':
        ProjectScreenshotManager::updateScreenshots($projectId, $screenshotUrls);
        break;
        
    default:
        echo "Unknown action: $action\n";
}

// Show the updated screenshots
if ($action !== 'list') {
    echo "\nUpdated screenshots:\n";
    ProjectScreenshotManager::listScreenshots($projectId);
} 