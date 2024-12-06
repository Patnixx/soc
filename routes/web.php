<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerifyMailController;
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
Route::get('/#', function() {
    return redirect()->route('home');
});

//!SECTION Home/Default routes
Route::get('/', [HomeController::class, 'homeIndex'])->name('/');
Route::get('/home', [HomeController::class, 'homeIndex'])->name('home');


//!SECTION Auth routes for login, register & logout
Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/custom-login', [AuthController::class, 'loginAuth'])->name('custom.login');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('/custom-register', [AuthController::class, 'registerAuth'])->name('custom.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//!SECTION Email verify routes
Route::get('/email/verify', [VerifyMailController::class, 'verifyNotice'])->middleware('auth')->name('verify.notice');
Route::get('/email/verify/{id}/{hash}', [VerifyMailController::class, 'verifyNotice'])->middleware(['auth', 'singed'])->name('verification.verify');
Route::post('/email/verification-notification', [VerifyMailController::class, 'resendEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//!SECTION Profile routes
Route::get('/profile', [ProfileController::class, 'profileIndex'])->name('profile');

//!SECTION Admin routes
Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin');

//!SECTION Course/Progress routes for CRUD courses & forms
Route::get('/progress', [CourseController::class, 'progressIndex'])->name('progress');
//NOTE - Form
Route::get('/course/form', [CourseController::class, 'courseForm'])->name('course.form');
Route::get('course/form/{id}/detail', [CourseController::class, 'detailForm'])->name('form.detail');
Route::get('course/form/{id}/edit', [CourseController::class, 'editForm'])->name('form.edit');
Route::post('course/form/{id}/delete', [CourseController::class, 'deleteForm'])->name('form.delete');
Route::post('/course/custom-form', [CourseController::class, 'sendForm'])->name('custom.form');
//NOTE - Course
route::get('/course/create', [CourseController::class, 'courseCreate'])->name('course.create');
route::get('/course/{id}/detail', [CourseController::class, 'detailCourse'])->name('course.detail');
route::get('/course/{id}/assign', [CourseController::class, 'assignCourse'])->name('course.assign');
route::post('/course/custom-assign/{id}/{courseid}', [CourseController::class, 'userAssign'])->name('custom.assign');
route::get('/course/{id}/edit', [CourseController::class, 'editCourse'])->name('course.edit');
route::post('/course/{id}/update', [CourseController::class, 'updateCourse'])->name('course.update');
route::post('/course/{id}/delete', [CourseController::class, 'deleteCourse'])->name('course.delete');
Route::post('/course/custom-create', [CourseController::class, 'sendCreate'])->name('custom.course');
