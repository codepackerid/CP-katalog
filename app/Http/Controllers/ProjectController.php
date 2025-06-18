<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index(Request $request)
    {
        try {
            $query = Project::query()->with('user');
            
            // Handle search
            if ($request->has('search') && $request->search) {
                $query->search($request->search);
            }
            
            $projects = $query->latest()->paginate(12);
            
            // Debug info
            Log::info('Projects loaded for index page', [
                'count' => $projects->count(),
                'first_project_id' => $projects->isNotEmpty() ? $projects->first()->id : null
            ]);
            
            return view('pages.projects', [
                'projects' => $projects,
                'searchTerm' => $request->search ?? ''
            ]);
        } catch (\Throwable $e) {
            Log::error("Error in ProjectController@index: " . $e->getMessage());
            return view('pages.projects', [
                'projects' => [],
                'error' => 'Terjadi kesalahan saat memuat proyek.'
            ]);
        }
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('pages.project-create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        // Log request untuk debugging
        Log::info('Project upload attempt', [
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name ?? 'unknown',
            'has_technologies' => $request->has('technologies'),
            'tech_count' => $request->has('technologies') ? count($request->technologies) : 0,
            'has_figma_url' => $request->has('figma_url'),
            'figma_url' => $request->figma_url,
            'has_video_url' => $request->has('video_url'),
            'video_url' => $request->video_url
        ]);

        try {
            // 1. Validasi input
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|max:2048',
                'repository_url' => 'nullable|url|max:255',
                'demo_url' => 'nullable|url|max:255',
                'figma_url' => 'nullable|url|max:255',
                'video_url' => 'nullable|url|max:255',
                'technologies' => 'nullable|array',
                'technologies.*' => 'string|max:50',
                'features' => 'nullable|array',
                'features.*.title' => 'nullable|string|max:100',
                'features.*.description' => 'nullable|string',
                'screenshots' => 'nullable|array',
                'screenshots.*' => 'nullable|url',
            ]);
            
            // 2. Buat project baru
            $project = new Project();
            $project->title = $validated['title'];
            $project->description = $validated['description'];
            $project->repository_url = $validated['repository_url'] ?? null;
            $project->demo_url = $validated['demo_url'] ?? null;
            $project->figma_url = $validated['figma_url'] ?? null;
            $project->video_url = $validated['video_url'] ?? null;
            $project->user_id = auth()->id(); 
            $project->status = 'published';
            
            // Handle features array
            if ($request->has('features')) {
                $features = [];
                foreach ($request->features as $feature) {
                    if (!empty($feature['title']) || !empty($feature['description'])) {
                        $features[] = [
                            'title' => $feature['title'] ?? '',
                            'description' => $feature['description'] ?? ''
                        ];
                    }
                }
                if (!empty($features)) {
                    $project->features = $features;
                }
            }
            
            // 3. Handle technologies array
            if ($request->has('technologies')) {
                // Simpan sebagai JSON string
                $project->technologies = $request->technologies;
                Log::info('Technologies data', ['value' => json_encode($request->technologies)]);
            } else {
                $project->technologies = null;
            }
            
            // Handle screenshots array
            if ($request->has('screenshots')) {
                $screenshots = array_filter($request->screenshots, function($url) {
                    return !empty($url);
                });
                $project->screenshots = !empty($screenshots) ? $screenshots : null;
                Log::info('Screenshots data', ['count' => count($screenshots)]);
            }
            
            // 4. Simpan project untuk mendapatkan ID
            $project->save();
            Log::info('Project created', [
                'id' => $project->id, 
                'title' => $project->title,
                'figma_url' => $project->figma_url,
                'video_url' => $project->video_url
            ]);
            
            // 5. Upload gambar jika ada
            if ($request->hasFile('image')) {
                // Generate unique filename
                $fileName = time() . '_' . auth()->id() . '.' . $request->file('image')->getClientOriginalExtension();
                
                // Store file
                $path = $request->file('image')->storeAs('projects', $fileName, 'public');
                
                // Update project with image path
                $project->image = $path;
                $project->save();
                
                Log::info('Image uploaded', ['path' => $path]);
            }
            
            // 6. Simpan project dan verifikasi
            $project->refresh();
            Log::info('Project saved and refreshed', [
                'id' => $project->id,
                'user_id' => $project->user_id,
                'title' => $project->title,
                'has_image' => !empty($project->image),
                'figma_url' => $project->figma_url,
                'video_url' => $project->video_url
            ]);
            
            // 7. Redirect dengan pesan sukses
            return redirect()->route('projects.show', $project->id)
                ->with('success', 'Project berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            Log::error('Error creating project', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified project.
     */
    public function show($id)
    {
        try {
            $project = Project::with('user')->findOrFail($id);
            
            Log::info('Viewing project details', [
                'project_id' => $id,
                'title' => $project->title,
                'user_id' => $project->user_id
            ]);
            
            return view('pages.project-detail', [
                'project' => $project,
                'id' => $id
            ]);
        } catch (\Throwable $e) {
            Log::error("Error in ProjectController@show: " . $e->getMessage());
            abort(404, 'Proyek tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        
        // Check if user owns this project
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit proyek ini.');
        }
        
        return view('pages.project-edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        // Log update attempt
        Log::info('Project update attempt', [
            'project_id' => $id,
            'user_id' => auth()->id(),
            'has_figma_url' => $request->has('figma_url'),
            'figma_url' => $request->figma_url,
            'has_video_url' => $request->has('video_url'),
            'video_url' => $request->video_url
        ]);
        
        // Check if user owns this project
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit proyek ini.');
        }
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'repository_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'figma_url' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:50',
            'features' => 'nullable|array',
            'features.*.title' => 'nullable|string|max:100',
            'features.*.description' => 'nullable|string',
            'screenshots' => 'nullable|array',
            'screenshots.*' => 'nullable|url',
        ]);

        // Update project fields
        $project->title = $validated['title'];
        $project->description = $validated['description'];
        $project->repository_url = $validated['repository_url'] ?? null;
        $project->demo_url = $validated['demo_url'] ?? null;
        $project->figma_url = $validated['figma_url'] ?? null;
        $project->video_url = $validated['video_url'] ?? null;
        
        // Handle features array
        if ($request->has('features')) {
            $features = [];
            foreach ($request->features as $feature) {
                if (!empty($feature['title']) || !empty($feature['description'])) {
                    $features[] = [
                        'title' => $feature['title'] ?? '',
                        'description' => $feature['description'] ?? ''
                    ];
                }
            }
            $project->features = !empty($features) ? $features : null;
        }
        
        // Handle technologies
        if ($request->has('technologies')) {
            $project->technologies = $request->technologies;
        }

        // Handle screenshots array
        if ($request->has('screenshots')) {
            $screenshots = array_filter($request->screenshots, function($url) {
                return !empty($url);
            });
            $project->screenshots = !empty($screenshots) ? $screenshots : null;
            Log::info('Screenshots updated', ['count' => count($screenshots)]);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            
            // Upload new image
            $fileName = time() . '_' . auth()->id() . '.' . $request->file('image')->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('projects', $fileName, 'public');
            $project->image = $path;
        }

        // Save changes
        $project->save();
        
        Log::info('Project updated', [
            'id' => $project->id, 
            'title' => $project->title,
            'figma_url' => $project->figma_url,
            'video_url' => $project->video_url
        ]);

        return redirect()->route('projects.show', $project->id)
                         ->with('success', 'Proyek berhasil diperbarui!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // Check if user owns this project
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki izin untuk menghapus proyek ini.');
        }
        
        // Delete project image if exists
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        // Delete the project
        $project->delete();
        
        Log::info('Project deleted', ['id' => $id, 'user_id' => auth()->id()]);

        return redirect()->route('projects.index')
                         ->with('success', 'Proyek berhasil dihapus!');
    }
} 