<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use App\Http\Controllers\Admin\PropertyCategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\AmenityController as AdminAmenityController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\InspectionController as AdminInspectionController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $featuredProperties = \App\Models\Property::with(['category', 'location', 'coverImage', 'virtualTour'])
        ->where('is_featured', true)
        ->orderByRaw("CASE WHEN slug = 'lumiere-suites' THEN 1 ELSE 2 END ASC")
        ->orderBy('id', 'desc') // Put newest properties (Lumiere Suites) first at the top
        ->take(6)
        ->get();

    // Query in-development properties dynamically for the Lagos Luxury Enclaves section
    $inDevelopmentProperties = \App\Models\Property::with(['category', 'location', 'coverImage', 'virtualTour', 'units'])
        ->inDevelopment()
        ->orderByRaw("CASE WHEN slug = 'lumiere-suites' THEN 1 ELSE 2 END ASC")
        ->orderBy('id', 'desc')
        ->get();
    
    // Resolve premium locations dynamically by name for robust, fail-safe links
    $lekkiLocation = \App\Models\Location::where('name', 'Lekki Phase 1')->first();
    $ikoyiLocation = \App\Models\Location::where('name', 'Old Ikoyi')->first();
    $viLocation = \App\Models\Location::where('name', 'Victoria Island')->first();

    return view('welcome', compact('featuredProperties', 'inDevelopmentProperties', 'lekkiLocation', 'ikoyiLocation', 'viLocation'));
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [PropertyController::class, 'contact'])->name('contact.submit');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{slug}', [PropertyController::class, 'show'])->name('properties.show');
Route::post('/properties/{slug}/enquire', [PropertyController::class, 'enquire'])->name('properties.enquire');
Route::post('/properties/{slug}/book', [PropertyController::class, 'book'])->name('properties.book');
Route::post('/chat', [ChatbotController::class, 'chat'])->name('chat');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

Route::get('/shortlets', function () {
    return view('shortlets');
})->name('shortlets');

Route::get('/projects', function () {
    $inDevelopmentProperties = \App\Models\Property::with(['category', 'location', 'coverImage', 'virtualTour', 'units', 'amenities'])
        ->inDevelopment()
        ->orderByRaw("CASE WHEN slug = 'lumiere-suites' THEN 1 ELSE 2 END ASC")
        ->orderBy('id', 'desc')
        ->get();

    return view('projects', compact('inDevelopmentProperties'));
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

    // Full Property CRUD resource routes
    Route::resource('/properties', AdminPropertyController::class);

    // Full Metadata CRUD & Leads resource routes
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/locations', AdminLocationController::class);
    Route::resource('/amenities', AdminAmenityController::class);
    Route::resource('/enquiries', AdminEnquiryController::class)->only(['index', 'update', 'destroy']);
    Route::resource('/inspections', AdminInspectionController::class)->only(['index', 'update', 'destroy']);
    Route::resource('/bookings', AdminBookingController::class)->only(['index', 'update', 'destroy']);

    // General Administration Performance Reports
    Route::get('/reports/revenue', [\App\Http\Controllers\Admin\ReportController::class, 'revenue'])->name('reports.revenue');
    Route::get('/reports/operations', [\App\Http\Controllers\Admin\ReportController::class, 'operations'])->name('reports.operations');

    // Nested secure route group strictly requiring Super Admin access for activity logs auditing
    Route::middleware('super_admin')->group(function () {
        Route::get('/activity-logs', [\App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('activity-logs.index');
        Route::get('/reports/compliance', [\App\Http\Controllers\Admin\ReportController::class, 'compliance'])->name('reports.compliance');
    });
});

require __DIR__.'/auth.php';
