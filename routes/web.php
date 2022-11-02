<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AuthController::class, "loginView"])->name('home');
Route::get('/login', [AuthController::class, "loginView"])->name('login');
Route::get('/register', [AuthController::class, "registerView"])->name('register');;
Route::post('/do-login', [AuthController::class, "doLogin"])->name('dologin');
Route::post('/do-register', [AuthController::class, "doRegister"])->name('doregister');
Route::get('/dashboard', [AuthController::class, "dashboard"])->name('dashboard');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::post('/upload-image', [AuthController::class, "upload"])->name('upload.image');
Route::get('/gallery', [AuthController::class, "gallery"])->name('gallery');
