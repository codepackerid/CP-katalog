<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the global search request.
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        if (!$query) {
            return redirect()->back();
        }

        // Search projects
        $projects = Project::where('status', 'published')
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->latest()
            ->limit(10)
            ->get();

        // Search users
        $users = User::where('name', 'like', "%{$query}%")
                      ->orWhere('bio', 'like', "%{$query}%")
                      ->limit(10)
                      ->get();

        return view('pages.search-results', [
            'query' => $query,
            'projects' => $projects,
            'users' => $users,
        ]);
    }
} 