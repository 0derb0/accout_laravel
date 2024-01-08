<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::get('/', function() {
    return view('home');
})->name('home');



Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::prefix('/user')->middleware('auth')->group(function() {
    Route::get('/show', [UserController::class, 'show'])->name('user.show');

    Route::get('/update', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/update-password', [UserController::class, 'editPassword'])->name('user.editPassword');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    Route::post('/delete', [UserController::class, 'destroy'])->name('user.delete');
});