<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display the specified user profile.
     */
    public function show(string $id = 'me')
    {
        // If no ID is provided, show the authenticated user's profile
        if ($id === 'me' || $id === null) {
            $user = auth()->user();
            if (!$user) {
                return redirect()->route('login')->with('error', 'Please login to view your profile');
            }
        } else {
            $user = User::findOrFail($id);
        }

        // Get user's projects with eager loading
        $projects = \App\Models\Project::where('user_id', $user->id)
                    ->where('status', 'published')
                    ->latest()
                    ->get();

        // Log retrieved projects for debugging
        \Log::info('Retrieved projects for user ' . $user->id, ['count' => $projects->count()]);
        
        return view('pages.profile', [
            'user' => $user,
            'projects' => $projects,
        ]);
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        return view('pages.profile-edit', [
            'user' => Auth::user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'bio' => ['nullable', 'string', 'max:1000'],
            'location' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'github' => ['nullable', 'string', 'max:255'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($user->avatar && !str_starts_with($user->avatar, 'default/')) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('status', 'Profile berhasil diperbarui');
    }

    /**
     * Show the form for changing password.
     */
    public function showChangePasswordForm()
    {
        return view('pages.change-password');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile')->with('status', 'Password berhasil diperbarui');
    }
} 