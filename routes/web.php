<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\EnrollmentController;

use App\Http\Middleware\Admin;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/courses/create',[CoursesController::class,'create'])->name('courses.create');
    Route::post('/courses',[CoursesController::class,'store'])->name('courses.store');
    Route::get('/courses/{id}/edit',[CoursesController::class,'edit'])->name('courses.edit');
    Route::put('/courses/{id}',[CoursesController::class,'update'])->name('courses.update');
    Route::delete('/courses/{id}',[CoursesController::class,'destroy'])->name('courses.destroy');
    Route::get('/courses/{id}/lessons/create', [LessonsController::class, 'create'])->name('lessons.create');
    Route::post('/courses/{id}/lessons', [LessonsController::class, 'store'])->name('lessons.store');
    Route::get('/courses/{id}/lessons/{lid}/edit', [LessonsController::class, 'edit'])->name('lessons.edit');
    Route::put('/courses/{id}/lessons/{lid}', [LessonsController::class, 'update'])->name('lessons.update');
    Route::delete('/courses/{id}/lessons/{lid}', [LessonsController::class, 'destroy'])->name('lessons.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Lessons Routes
Route::get('/courses/{id}/lessons', [LessonsController::class, 'index'])->name('lessons.index');
Route::get('/courses/{id}/lessons/{lid}', [LessonsController::class, 'show'])->name('lessons.show');


//Courses

Route::get('/courses',[CoursesController::class , 'index'])->name('courses.index');
Route::get('/courses/{id}',[CoursesController::class,'show'])->name('courses.show');
Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'store'])->name('courses.enroll')->middleware('auth');
Route::get('/user/courses', [EnrollmentController::class, 'index'])->name('user.courses')->middleware('auth');


require __DIR__.'/auth.php';
