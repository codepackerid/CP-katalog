<?php // DirectProjectController

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class DirectProjectController extends Controller
{
    public function showForm()
    {
        return view('pages.direct-project-form');
    }
    
    public function store(Request $request)
    {
        // Mulai transaksi database
        DB::beginTransaction();
        
        try {
            // Log semua request untuk debugging
            Log::info('Upload project attempt', [
                'user_id' => Auth::id(),
                'user_name' => Auth::user()->name,
                'post_data' => $request->except(['image'])
            ]);
            
            // Validasi minimal
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            
            // Siapkan data project
            $projectData = [
                'title' => $request->title,
                'description' => $request->description,
                'repository_url' => $request->repository_url,
                'demo_url' => $request->demo_url,
                'user_id' => Auth::id(),
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            // Handle technologies dengan aman
            if ($request->has('technologies') && is_array($request->technologies)) {
                $projectData['technologies'] = json_encode($request->technologies);
                Log::info('Technologies JSON', ['value' => $projectData['technologies']]);
            } else {
                $projectData['technologies'] = json_encode([]);
            }
            
            // Insert project ke database
            $projectId = DB::table('projects')->insertGetId($projectData);
            Log::info('Project created', ['id' => $projectId]);
            
            // Handle upload gambar
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = 'project_' . time() . '_' . $projectId . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/projects', $fileName);
                
                // Update project dengan path image
                DB::table('projects')
                    ->where('id', $projectId)
                    ->update(['image' => 'projects/' . $fileName]);
                
                Log::info('Project image uploaded', ['path' => 'projects/' . $fileName]);
            }
            
            // Commit transaksi jika semua berhasil
            DB::commit();
            
            // Redirect dengan pesan sukses
            return redirect()
                ->route('projects.show', $projectId)
                ->with('success', 'Project berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            // Rollback transaksi jika ada error
            DB::rollBack();
            
            Log::error('Failed to store project', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Redirect dengan pesan error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan project: ' . $e->getMessage());
        }
    }
}
