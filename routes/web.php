<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\RabbitManagementController;
use App\Http\Controllers\CageManagementController;

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
    if (\Illuminate\Support\Facades\Auth::check()){
        return view('welcome');
    }
    return redirect(\route('login'));
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
    //Szczegóły królika
    Route::get('/management/rabbits/show/{rabbit}', [RabbitManagementController::class, 'show'])->name('management.rabbits.show');
    //Dodawanie królików
    Route::get('/management/rabbits/create', [RabbitManagementController::class, 'create'])->name('management.rabbits.create');
    Route::post('/management/rabbits/create',[RabbitManagementController::class, 'store'])->name('management.rabbits.store');
    //Edycja królików
    Route::get('/management/rabbits/edit/{rabbit}', [RabbitManagementController::class, 'edit'])->name('management.rabbits.edit');
    Route::post('/management/rabbits/edit/{rabbit}/update', [RabbitManagementController::class, 'update'])->name('management.rabbits.update');
    //Usuwanie królików
    Route::post('/management/rabbits/delete/{rabbit}', [RabbitManagementController::class, 'delete'])->name('management.rabbits.delete');
});

// Management dla klatek
Route::middleware('auth')->group(function () {
    Route::get('/management/cages/index', [CageManagementController::class, 'index'])->name('management.cages.index');
    Route::get('/management/cages/eye/create', [CageManagementController::class, 'createEay'])->name('management.cages.eye.create');
    Route::post('/management/cages/eye/store', [CageManagementController::class, 'storeEye'])->name('management.cages.eye.store');
});


// Edycja użytkownika
Route::middleware('auth')->group(function () {
    //edycja użytkownika
    Route::get('/user/edit', [UserController::class, 'useredit'])->name('user.edit');
    //aktualizacja danych uzytkownika
    Route::post('/user/{user}/update',[UserController::class, 'userupdate'])->name('user.update');
});

