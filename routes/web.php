<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('', [HomeController::class, 'homeIndex'])->name('home');
Route::get('/', [HomeController::class, 'homeIndex'])->name('home');
Route::get('/home', [HomeController::class, 'homeIndex'])->name('home');

Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
Route::post('/custom-login', [AuthController::class, 'loginAuth'])->name('custom.login');
Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
Route::post('/custom-register', [AuthController::class, 'registerAuth'])->name('custom.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// FIXME - Ikony v icon componente nechcu robit dynamicke cesty, ale staticke
Route::get('/login/home', [HomeController::class, 'homeIndex'])->name('home');
Route::get('/register/home', [HomeController::class, 'homeIndex'])->name('home');