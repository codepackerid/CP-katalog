<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TestProjectController;
use App\Http\Controllers\DirectProjectController;
use App\Http\Controllers\DebugController;

// Home Page
Route::get('/', function () {
    $projects = \App\Models\Project::latest()->limit(6)->get();
    $members = \App\Models\User::latest()->limit(4)->get();
    
    return view('pages.home', compact('projects', 'members'));
});

// Projects Routes
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware('auth')->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->middleware('auth')->name('projects.store');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->middleware('auth')->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->middleware('auth')->name('projects.update');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->middleware('auth')->name('projects.destroy');

// Search Route
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Members Page
Route::get('/anggota', function () {
    $members = \App\Models\User::paginate(12);
    return view('pages.anggota', compact('members'));
})->name('anggota.index');

// About Page
Route::get('/tentang', [AboutController::class, 'index'])->name('about.index');

// Forum Page
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');
    Route::get('/change-password', [UserController::class, 'showChangePasswordForm'])->name('password.change');
    Route::put('/change-password', [UserController::class, 'updatePassword'])->name('password.update');
});

// We're now using modals for portfolio upload instead of a separate page

// Test Routes
Route::get('/test-project', [TestProjectController::class, 'showForm']);
Route::post('/test-project-store', [TestProjectController::class, 'storeProject']);

// Direct Project Routes
Route::get('/direct-project', [DirectProjectController::class, 'showForm']);
Route::post('/direct-project-store', [DirectProjectController::class, 'store']);

// Debug routes
Route::get('/debug/projects-table', [DebugController::class, 'checkProjectsTable']);
Route::get('/debug/project/{id}', [DebugController::class, 'getProject']);
Route::get('/debug/update-project-links/{id}', [DebugController::class, 'updateProjectLinks']);
