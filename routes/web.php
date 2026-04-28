<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');
Route::prefix('admin')->group(function () {


    Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('departments', DepartmentController::class);

    Route::resource('courses', CourseController::class);

    Route::resource('students', \App\Http\Controllers\StudentController::class);
    require __DIR__ . '/settings.php';
    require __DIR__ . '/auth.php';

});

