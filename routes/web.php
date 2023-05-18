<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {

    return view('welcome');
});


Route::get('/login', [AuthController::class, 'StudentshowLoginForm'])->name('student_login');
Route::post('/login', [AuthController::class, 'StudentLogin']);
Route::get('/register', [AuthController::class, 'StudentshowRegisterForm'])->name('student_register');
Route::post('/register', [AuthController::class, 'StudentRegister']);
Route::get('/logout', [AuthController::class, 'studentLogout'])->name('student_logout');


Route::middleware(['auth.check', 'auth:student'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});

//teacher routes 
Route::get('/teacher/login', [AuthController::class, 'TeachershowLoginForm'])->name('teacher_login');
Route::post('/teacher/login', [AuthController::class, 'TeacherLogin']);
Route::get('/teacher/logout', [AuthController::class, 'teacherLogout'])->name('teacher_logout');

Route::middleware(['auth.check', 'auth:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [AuthController::class, 'dashboard'])->name('teacher_dashboard');
});

//admin routes 
Route::get('/admin/login', [AuthController::class, 'AdminshowLoginForm'])->name('admin_login');
Route::post('/admin/login', [AuthController::class, 'AdminLogin']);
Route::get('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin_logout');

Route::middleware(['auth.check', 'auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin_dashboard');
    // Batches routes
    Route::resource('/admin/batch', BatchController::class);

    // Courses routes
    Route::resource('/admin/course', CourseController::class);

    // Classes routs
    Route::resource('/admin/lmsclass', LessonController::class);

    // Classes routs
    Route::resource('/admin/teacher', TeachersController::class);
});
