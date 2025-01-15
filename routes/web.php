<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OccasionController;
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
//!SECTION Home/Default routes
Route::get('/', [HomeController::class, 'homeIndex'])->name('/');
Route::get('/home', [HomeController::class, 'homeIndex'])->name('home');
Route::get('/#about', [HomeController::class, 'homeIndex'])->name('#about');
Route::get('/#personnel', [HomeController::class, 'homeIndex'])->name('#personnel');
Route::get('/#cars', [HomeController::class, 'homeIndex'])->name('#cars');
Route::get('/#contact', [HomeController::class, 'homeIndex'])->name('#contact');

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
Route::get('/profile/personal', [ProfileController::class, 'personalIndex'])->name('personal');
Route::get('/profile/personal/update', [ProfileController::class, 'personalUpdate'])->name('personal.update');
Route::get('/profile/password', [ProfileController::class, 'passwordIndex'])->name('password');
Route::get('/profile/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
Route::get('/profile/email', [ProfileController::class, 'emailIndex'])->name('email');
Route::get('/profile/email/update', [ProfileController::class, 'emailUpdate'])->name('email.update');
Route::get('/credits', [ProfileController::class, 'creditsIndex'])->name('credits');

//!SECTION Admin routes
Route::get('/admin', [AdminController::class, 'adminIndex'])->name('admin');
    //*STUB - User CRUD routes
    Route::get('/users', [AdminController::class, 'usersIndex'])->name('users');
    Route::get('/users/create', [AdminController::class, 'usersCreate'])->name('users.create');
    Route::post('/create-user', [AdminController::class, 'usersStore'])->name('users.store');
    Route::get('/users/{id}/edit', [AdminController::class, 'usersEdit'])->name('users.edit');
    Route::post('/users/{id}/update-user', [AdminController::class, 'usersUpdate'])->name('users.update');
    Route::post('/users/{id}/delete', [AdminController::class, 'usersDelete'])->name('users.delete');

//!SECTION Course/Progress routes for CRUD courses & forms
Route::get('/progress', [CourseController::class, 'progressIndex'])->name('progress');
//NOTE - Form
Route::get('/form', [CourseController::class, 'courseForm'])->name('course.form');
Route::get('/form/{id}/detail', [CourseController::class, 'detailForm'])->name('form.detail');
Route::get('/form/{id}/edit', [CourseController::class, 'editForm'])->name('form.edit');
Route::post('/form/{id}/update', [CourseController::class, 'updateForm'])->name('form.update');
Route::post('/form/{id}/delete', [CourseController::class, 'deleteForm'])->name('form.delete');
Route::post('/custom-form', [CourseController::class, 'sendForm'])->name('custom.form');
//NOTE - Course
route::get('/course/create', [CourseController::class, 'courseCreate'])->name('course.create');
route::get('/course/{id}/detail', [CourseController::class, 'detailCourse'])->name('course.detail');
route::get('/course/{id}/assign', [CourseController::class, 'assignCourse'])->name('course.assign');
route::post('/course/custom-assign/{id}/{courseid}', [CourseController::class, 'userAssign'])->name('custom.assign');
route::get('/course/{id}/edit', [CourseController::class, 'editCourse'])->name('course.edit');
route::post('/course/{id}/update', [CourseController::class, 'updateCourse'])->name('course.update');
route::post('/course/{id}/delete', [CourseController::class, 'deleteCourse'])->name('course.delete');
Route::post('/course/custom-create', [CourseController::class, 'sendCreate'])->name('custom.course');

//!SECTION Inbox
Route::get('/inbox', [InboxController::class, 'inboxIndex'])->name('inbox');
Route::get('/inbox/new', [InboxController::class, 'newIndex'])->name('new.message');
Route::post('/inbox/new/send', [InboxController::class, 'createMessage'])->name('custom.message');
Route::post('/inbox/{id}/delete', [InboxController::class, 'deleteMessage'])->name('message.delete');
Route::get('/inbox/deleted', [InboxController::class, 'deletedIndex'])->name('deleted.messages');
Route::post('/inbox/{id}/restore', [InboxController::class, 'restoreMessage'])->name('message.restore');
Route::post('/inbox/bin', [InboxController::class, 'binClear'])->name('clear.bin');

//!EVENTS
Route::get('/events', [OccasionController::class, 'index'])->name('events');
Route::get('/events/create-theory', [OccasionController::class, 'create_theory'])->name('events.create.theory');
Route::get('/events/create-ride', [OccasionController::class, 'create_ride'])->name('events.create.ride');
Route::post('/events/assign-ride', [OccasionController::class, 'assign_ride'])->name('events.assign.ride');
Route::post('/events/store-theory', [OccasionController::class, 'store_theory'])->name('events.store.theory');
Route::post('/events/{courseid}/store-ride', [OccasionController::class, 'store_ride'])->name('events.store.ride');
Route::get('/events/{id}/edit', [OccasionController::class, 'edit'])->name('events.edit');
Route::post('/events/{id}/update', [OccasionController::class, 'update'])->name('events.update');
Route::post('/events/{id}/delete', [OccasionController::class, 'delete'])->name('events.delete');

//FIXME - Add this functions
Route::get('/inbox/{id}/detail', [InboxController::class, 'detailMessage'])->name('message.detail');
Route::get('/inbox/{id}/reply', [InboxController::class, 'replyMessage'])->name('message.reply');
Route::post('/inbox/{id}/reply/send', [InboxController::class, 'sendReply'])->name('custom.reply');

Route::post('/set-language', [LocaleController::class, 'setLanguage'])->name('set.language');

//!MATERIALS
Route::get('/materials', [MaterialController::class, 'index'])->name('materials');
Route::get('/materials/create-syllab', [MaterialController::class, 'create_syllab'])->name('materials.create.syllab');
Route::post('/materials/store', [MaterialController::class, 'store'])->name('materials.store');
Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::post('/materials/{id}/update', [MaterialController::class, 'update'])->name('materials.update');
Route::post('/materials/{id}/delete', [MaterialController::class, 'delete'])->name('materials.delete');

