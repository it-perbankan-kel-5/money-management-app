<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BudgetingMailController;

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



Route::get('/login', [AuthController::class, 'signin_index']);
Route::post('/login/signin', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register_index']);
Route::post('/register/signup', [AuthController::class, 'signup']);



Route::get('/profile', [UserController::class, 'index']);

Route::get('/editprofile', function () {
    return view('edit_profile');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/budgeting', function () {
    return view('budgeting');
});

Route::get('/addbudgeting', function () {
    return view('add_budgeting');
});

Route::get('/emails/budgeting_mail', [BudgetingMailController::class, 'sendMail']);

Route::get('/rekening', [RekeningController::class, 'index']);
Route::post('/rekening/add', [RekeningController::class, 'add_rekening']);


