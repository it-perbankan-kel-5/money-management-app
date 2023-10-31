<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

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
    return view('components.layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', [AuthController::class, 'signin_index']);
Route::post('/login/signin', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register_index']);
Route::post('/register/signup', [AuthController::class, 'signup']);

Route::get('/profile', [UserController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
