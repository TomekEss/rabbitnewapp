<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RabbitManagementController;

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

// Management dla królików
Route::middleware('auth')->group(function () {
    //Lista królików
    Route::get('/management/rabbits/index', [RabbitManagementController::class, 'index'])->name('management.rabbits.index');
    //Dodawanie królików
    Route::get('/management/rabbits/create', [RabbitManagementController::class, 'create'])->name('management.rabbits.create');
    Route::post('/management/rabbits/create',[RabbitManagementController::class, 'store'])->name('management.rabbits.store');
    //Edycja królików
    Route::get('/management/rabbits/edit', [RabbitManagementController::class, 'edit'])->name('management.rabbits.edit');
});

// Edycja użytkownika
Route::middleware('auth')->group(function () {
    //edycja użytkownika
    Route::get('/user/edit', [UserController::class, 'useredit'])->name('user.edit');
    //aktualizacja danych uzytkownika
    Route::post('/user/{user}/update',[UserController::class, 'userupdate'])->name('user.update');
});

