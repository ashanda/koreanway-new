<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\UserPaymentController;
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

Route::redirect('/admin', '/admin/login');
Route::redirect('/teacher', '/teacher/login');


Route::get('/login', [AuthController::class, 'StudentshowLoginForm'])->name('student_login');
Route::post('/login', [AuthController::class, 'StudentLogin']);
Route::get('/register', [AuthController::class, 'StudentshowRegisterForm'])->name('student_register');
Route::post('/register', [AuthController::class, 'StudentRegister']);
Route::get('/logout', [AuthController::class, 'studentLogout'])->name('student_logout');
Route::get('/get_batch/{courseId}', [BatchController::class, 'getBatch'])->name('get_batch');

Route::middleware(['auth.check', 'auth:student'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/lesson/{lessontype}/{id}', [LessonController::class, 'singleLesson'])->name('single-lesson');
    Route::post('/process-payment', [UserPaymentController::class , 'saveData'])->name('process.payment');


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
      
   
       // Classes routs
       Route::resource('/admin/teacher', TeachersController::class);

       
       Route::get('/fetch-courses', [CourseController::class, 'fetchCourses']);
       Route::get('/fetch-batches', [BatchController::class, 'fetchBatches']);
       Route::post('/manual-paymant', [UserPaymentController::class, 'manualPay'])->name('manual-pay');
    
});



//Admin & Teacher routes
Route::middleware(['auth.check','auth:teacher,admin'])->group(function () {    
    
    Route::post('/payment/{id}', [UserPaymentController::class, 'update'])->name('payments.update');
    Route::resource('/admin/lesson', LessonController::class);
    Route::resource('/teacher/lesson', LessonController::class);
});
//All Acessroutes
Route::middleware(['auth.check','auth:teacher,admin,student'])->group(function () {

    Route::get('/lesson/{lessontype}', [LessonController::class, 'lesson'])->name('lesson');
    Route::post('/lesson/{lessontype}', [LessonController::class, 'filter'])->name('filter-lessons');
    Route::get('/payment/{paytype}', [UserPaymentController::class, 'paytype'])->name('payment');
    
});