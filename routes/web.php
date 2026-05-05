<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    // return redirect()->route('login');
    return Inertia::render('Welcome', [
        'videos' => \App\Models\Video::all(),
    ]);
})->name('home');
Route::prefix('admin')->group(function () {

    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('departments', DepartmentController::class);

    Route::resource('courses', CourseController::class);

    Route::resource('students', \App\Http\Controllers\StudentController::class);

    Route::resource('videos', \App\Http\Controllers\VideoController::class);

    require __DIR__ . '/settings.php';
    require __DIR__ . '/auth.php';

});

