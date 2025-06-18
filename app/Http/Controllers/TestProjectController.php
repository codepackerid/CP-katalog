<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TestProjectController extends Controller
{
    /**
     * Tampilkan form upload project untuk testing
     */
    public function showForm()
    {
        return view('test.project-form');
    }
    
    /**
     * Proses upload project dengan cara sederhana
     */
    public function storeProject(Request $request)
    {
        // Log semua input yang diterima
        Log::info('Test Project Upload - Input diterima', $request->all());
        
        try {
            // Validasi input minimal
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);
            
            // Buat array data project
            $projectData = [
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => Auth::id(), // ID user yang login
                'status' => 'published',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            
            // Handle technologies jika ada
            if ($request->has('technologies')) {
                $projectData['technologies'] = json_encode($request->technologies);
            }
            
            // Handle repository_url dan demo_url jika ada
            if ($request->filled('repository_url')) {
                $projectData['repository_url'] = $request->repository_url;
            }
            
            if ($request->filled('demo_url')) {
                $projectData['demo_url'] = $request->demo_url;
            }
            
            // Handle upload gambar jika ada
            if ($request->hasFile('image')) {
                // Simpan file
                $path = $request->file('image')->store('projects', 'public');
                $projectData['image'] = $path;
            }
            
            // Insert ke database menggunakan Query Builder
            $projectId = DB::table('projects')->insertGetId($projectData);
            
            Log::info('Test Project Upload - Berhasil disimpan', [
                'project_id' => $projectId, 
                'data' => $projectData
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Project berhasil disimpan dengan ID: ' . $projectId,
                'project_id' => $projectId,
                'data' => $projectData
            ]);
        } catch (\Exception $e) {
            Log::error('Test Project Upload - Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }
} 