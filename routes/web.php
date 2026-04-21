<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard', [
        'courses' => \App\Models\Course::count(),
        'departments' => \App\Models\Department::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('departments', DepartmentController::class);

Route::resource('courses', CourseController::class);

Route::resource('students', \App\Http\Controllers\StudentController::class);

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
