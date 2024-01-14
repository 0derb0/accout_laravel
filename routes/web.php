<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PostController;
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
    Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/user')->middleware('auth')->group(function() {
    Route::get('/show', [UserController::class, 'show'])->name('user.show');

    Route::get('/update', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/update', [UserController::class, 'update'])->name('user.update');

    Route::get('/update-password', [UserController::class, 'editPassword'])->name('user.editPassword');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    Route::delete('/delete', [UserController::class, 'destroy'])->name('user.delete');
});

Route::prefix('/posts')->middleware('auth')->name('posts.')->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('index');

    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');

    Route::get('/show/{post}', [PostController::class, 'show'])->name('show');

    Route::get('/show-mine', [PostController::class, 'showMine'])->name('showMine');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::post('/update/{post}', [PostController::class, 'update'])->name('update');

    Route::delete('/delete/{post}', [PostController::class, 'destroy'])->name('delete');
});