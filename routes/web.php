<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetingController;
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
    return view('dashboard');
});

// Login
Route::get('/login', [AuthController::class, 'signin_index']);
Route::post('/login/signin', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Register
Route::get('/register', [AuthController::class, 'signup_index']);
Route::POST('/register/signup', [AuthController::class, 'register']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Profile 
Route::get('/profile', [UserController::class, 'index']);
Route::get('/edit_profile', [UserController::class, 'edit_user_profile']);
Route::patch('/edit_profile/update', [UserController::class, 'update_user_profile']);

// Rekening
Route::get('/rekening', [RekeningController::class, 'index']);
Route::POST('/rekening/add', [RekeningController::class, 'add_rekening']);
Route::DELETE('/rekening/delete/{id}', [RekeningController::class, 'delete_rekeningByid']);


// Budgeting
Route::get('/budgeting', [BudgetingController::class, 'index']);
Route::get('/addbudgeting', function () {
    return view('add_budgeting');
});

// Mail
Route::get('/emails/budgeting_mail', [BudgetingMailController::class, 'sendMail']);




