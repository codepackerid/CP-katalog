<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;

class DebugController extends Controller
{
    public function checkProjectsTable()
    {
        $output = [
            'schema_info' => [],
            'sample_data' => null,
            'column_info' => []
        ];
        
        // Check the projects table schema
        $hasTable = Schema::hasTable('projects');
        $output['schema_info']['table_exists'] = $hasTable;
        
        if ($hasTable) {
            // Get column information
            $columns = Schema::getColumnListing('projects');
            $output['schema_info']['columns'] = $columns;
            
            // Check for specific columns
            $output['schema_info']['has_figma_url'] = Schema::hasColumn('projects', 'figma_url');
            $output['schema_info']['has_video_url'] = Schema::hasColumn('projects', 'video_url');
            
            // Try to get a sample record
            $sample = DB::table('projects')->first();
            if ($sample) {
                $output['sample_data'] = json_decode(json_encode($sample), true);
            }
            
            // Get detailed column info
            foreach ($columns as $column) {
                $columnType = DB::connection()->getDoctrineColumn('projects', $column)->getType()->getName();
                $output['column_info'][$column] = $columnType;
            }
        }
        
        // Get Eloquent model info
        $output['model_info'] = [
            'fillable' => Project::make()->getFillable(),
            'casts' => Project::make()->getCasts()
        ];
        
        return response()->json($output);
    }
    
    public function getProject($id)
    {
        $project = Project::find($id);
        
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        
        $rawProject = DB::table('projects')->where('id', $id)->first();
        
        return response()->json([
            'eloquent_model' => $project,
            'raw_db_record' => $rawProject,
            'figma_url' => $project->figma_url,
            'video_url' => $project->video_url
        ]);
    }
    
    public function updateProjectLinks($id)
    {
        $project = Project::find($id);
        
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        
        // Update with test values
        $project->figma_url = 'https://figma.com/file/example';
        $project->video_url = 'https://youtube.com/watch?v=example';
        $project->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Links updated',
            'project' => $project
        ]);
    }
}
