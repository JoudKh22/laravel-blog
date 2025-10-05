<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Controllers\ProjectController;
// Home page
Route::get('/', [UserController::class, 'showDataInHome'])->name('home');

// Full post
Route::get('/fullpost/{id}', [UserController::class, 'showFullPost'])->name('fullpost');

// Dashboard (same blade for admin & user)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Add post
    Route::get('/addpost', [AdminController::class, 'addpost'])->name('admin.addpost');
    Route::post('/addpost', [AdminController::class, 'createpost'])->name('admin.createpost');
    
  Route::get('/contact/messages', [AdminController::class, 'showContactMessages'])->name('admin.contact.messages');

    // List all posts
    Route::get('/allpost', [AdminController::class, 'allpost'])->name('admin.allpost');

    // Edit post
    Route::get('/update/{id}', [AdminController::class, 'edit'])->name('admin.update');
    Route::post('/update/{id}', [AdminController::class, 'postupdate'])->name('admin.postupdate');

    // Delete post
    Route::delete('/posts/{id}', [AdminController::class, 'delete'])->name('admin.deletepost');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Contact form
// Contact form sayfası (GET)
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Contact form submit (POST)
Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    Contact::create($data);

    return back()->with('success', 'Mesajınız gönderildi. Teşekkürler!');
})->name('contact.send');
 // About page
Route::get('/about', function() {
    return view('about');
})->name('about');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/allprojects', [AdminController::class, 'allProjects'])->name('admin.allprojects');
    Route::get('/addproject', [AdminController::class, 'addProject'])->name('admin.addproject');
    Route::post('/addproject', [AdminController::class, 'createProject'])->name('admin.createproject');
    Route::get('/editproject/{id}', [AdminController::class, 'editProject'])->name('admin.editproject');
    Route::post('/updateproject/{id}', [AdminController::class, 'updateProject'])->name('admin.updateproject');
    Route::delete('/deleteproject/{id}', [AdminController::class, 'deleteProject'])->name('admin.deleteproject');
});
Route::get('/projects', [UserController::class, 'showProjects'])->name('projects');

Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.full');
require __DIR__.'/auth.php';
