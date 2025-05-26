<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(Request $request)
    {
        try {
            // Get the dummy data - simplified approach
            $data = include(resource_path('views/data/dummy-data.php'));
            
            // Set default projects array
            $projects = [];
            
            // Check if data is returned as an array with 'projects' key
            if (is_array($data) && isset($data['projects'])) {
                $projects = $data['projects'];
                Log::info("Projects loaded: " . count($projects));
            } else if (isset($GLOBALS['projects'])) {
                $projects = $GLOBALS['projects']; 
            }
            
            // Very basic filtering only - no complex operations
            $searchTerm = '';
            if ($request->has('search') && is_string($request->input('search'))) {
                $searchTerm = trim($request->input('search'));
            }
            
            // Sanitize projects data to avoid array errors
            foreach ($projects as $key => $project) {
                // Ensure technologies is an array
                if (!isset($project['technologies']) || !is_array($project['technologies'])) {
                    $projects[$key]['technologies'] = [];
                }
                
                // Ensure all expected fields exist with string defaults
                $stringFields = ['title', 'description', 'image', 'author'];
                foreach ($stringFields as $field) {
                    if (!isset($project[$field]) || !is_string($project[$field])) {
                        $projects[$key][$field] = $field === 'image' ? '/img/placeholder.jpg' : '';
                    }
                }
            }
            
            // Return simple view with minimal variables
            return view('pages.projects', [
                'projects' => $projects,
                'searchTerm' => $searchTerm
            ]);
        } catch (\Throwable $e) {
            Log::error("Error in ProjectController@index: " . $e->getMessage());
            return view('pages.projects', [
                'projects' => [],
                'error' => 'An error occurred while loading projects.'
            ]);
        }
    }

    /**
     * Display the specified project.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        try {
            // Get the dummy data
            $data = include(resource_path('views/data/dummy-data.php'));
            
            // Check if data is returned as an array with 'projects' key
            if (is_array($data) && isset($data['projects'])) {
                $projects = $data['projects'];
                Log::info("Projects loaded from data array in show(): " . count($projects));
            } 
            // Check if $projects is directly available (old format)
            else if (isset($GLOBALS['projects'])) {
                $projects = $GLOBALS['projects'];
                Log::info("Projects loaded from global variable in show(): " . count($projects));
            } 
            // Fallback to error
            else {
                Log::error("No projects data found in show()");
                abort(500, 'Data error: Projects data not found');
            }
            
            // Adjust for 1-based indexing in URLs (arrays are 0-based)
            $index = (int)$id - 1;
            
            // Check if the requested project exists
            if (!isset($projects[$index])) {
                Log::info("Project not found at index: {$index}");
                abort(404, 'Project not found');
            }
            
            // Get the specific project
            $project = $projects[$index];
            
            // Load data for view with project data
            return view('pages.project-detail', [
                'project' => $project,
                'id' => $id
            ]);
        } catch (\Throwable $e) {
            Log::error("Error in ProjectController@show: " . $e->getMessage());
            abort(500, 'Internal Server Error');
        }
    }
}
