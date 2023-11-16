<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

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
Route::get('/header', function () {
    return view('layouts.header');
});
Route::get('/master', function () {
    return view('master');
});

Route::get('/welcome',[WelcomeController::class, 'welcomeView'])->name('welcome');

Route::get('/register', [UserController::class, 'registerView'])->name('user.register');

Route::post('/register/store', [UserController::class, 'userStore'])->name('user.store');

Route::post('user/logout',[UserController::class, 'userLogout'])->name('user.logout');

Route::get('/login',[UserController::class, 'loginView'])->name('login');

Route::post('/login/attempt', [UserController::class, 'loginAttempt'])->name('user.login');

