<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::resource('courses', CourseController::class);
Route::resource('courses', CourseController::class);

Route::get('courses/index', [CourseController::class, 'index'])->name('courses.index');


require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
