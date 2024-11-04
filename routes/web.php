<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class,'LoginPage']);
Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard']);
Route::get('/student/dashboard',[StudentController::class,'StudentDashboard']);
Route::get('/teacher/dashboard',[TeacherController::class,'TeacherDashboard']);
Route::post('/user-login',[AuthController::class,'LoginForm']);
