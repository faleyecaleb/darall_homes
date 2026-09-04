<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/properties', function () {
    return view('properties.index');
})->name('properties.index');

Route::get('/properties/{slug}', function ($slug) {
    return view('properties.show', compact('slug'));
})->name('properties.show');

Route::get('/shortlets', function () {
    return view('shortlets');
})->name('shortlets');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

/*
|--------------------------------------------------------------------------
| Customer Dashboard
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Administrative Dashboard
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Resource route placeholders for future phases
    Route::get('/properties', function () {
        $properties = \App\Models\Property::with(['category', 'location', 'coverImage', 'virtualTour'])->get();
        return view('admin.properties.index', compact('properties'));
    })->name('properties.index');
});

require __DIR__.'/auth.php';
