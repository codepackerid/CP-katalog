<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Include dummy data
require_once __DIR__ . '/../resources/views/data/dummy-data.php';

// Home Page
Route::get('/', function () use ($projects, $members, $forumThreads, $aboutData) {
    return view('pages.home', compact('projects', 'members', 'forumThreads', 'aboutData'));
});

// Projects Pages
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

// Anggota (Members) Page
Route::get('/anggota', function () use ($projects, $members, $forumThreads, $aboutData) {
    return view('pages.anggota', compact('projects', 'members', 'forumThreads', 'aboutData'));
})->name('anggota.index');

// Tentang (About) Page
Route::get('/tentang', function () use ($projects, $members, $forumThreads, $aboutData) {
    return view('pages.tentang', compact('projects', 'members', 'forumThreads', 'aboutData'));
});

// Forum Page
Route::get('/forum', function () use ($projects, $members, $forumThreads, $aboutData) {
    return view('pages.forum', compact('projects', 'members', 'forumThreads', 'aboutData'));
});
