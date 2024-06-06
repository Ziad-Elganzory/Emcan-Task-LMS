<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses',[CoursesController::class , 'index'])->name('courses.index');
Route::get('/courses/create',[CoursesController::class,'create'])->name('courses.create');
Route::post('/courses',[CoursesController::class,'store'])->name('courses.store');
Route::get('/courses/{id}',[CoursesController::class,'show'])->name('courses.show');
Route::get('/courses/{id}/edit',[CoursesController::class,'edit'])->name('courses.edit');
Route::put('/courses/{id}',[CoursesController::class,'update'])->name('courses.update');
Route::delete('/courses/{id}',[CoursesController::class,'destroy'])->name('courses.destroy');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
