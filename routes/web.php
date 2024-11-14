<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

//Authentication

Route::get('/',[AuthController::class,'LoginPage']);
Route::get('/logout',[AuthController::class,'Logout']);
Route::post('/user-login',[AuthController::class,'LoginForm']);

//Teacher

Route::get('/teacher-list',[AdminController::class,'TeacherList']);
Route::get('/student-list',[AdminController::class,'StudentList']);


// Routes for Admin

Route::prefix('admin')->middleware(TokenVerificationMiddleware::class)->group(function () {

    //Page Routes

    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/teacher', [AdminController::class, 'TeacherPage'])->name('admin.teacher');

    //API Routes

    Route::post('/AddTeacher', [AdminController::class, 'AddTeacher'])->name('admin.add.teacher');
    Route::post('/UpdateTeacher', [AdminController::class, 'UpdateTeacher'])->name('admin.update.teacher');
    Route::post('/DeleteTeacher', [AdminController::class, 'DeleteTeacher'])->name('admin.delete.teacher');

    Route::post('/AddStudent', [AdminController::class, 'AddStudent'])->name('admin.add.Student');
    Route::post('/UpdateStudent', [AdminController::class, 'UpdateStudent'])->name('admin.update.Student');
    Route::post('/DeleteStudent', [AdminController::class, 'DeleteStudent'])->name('admin.delete.Student');




});

// Routes for Student

Route::prefix('student')->middleware(TokenVerificationMiddleware::class)->group(function () {
    Route::get('/dashboard', [StudentController::class, 'StudentDashboard'])->name('student.dashboard');

});

// Routes for Teacher

Route::prefix('teacher')->middleware(TokenVerificationMiddleware::class)->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'TeacherDashboard'])->name('teacher.dashboard');

});
