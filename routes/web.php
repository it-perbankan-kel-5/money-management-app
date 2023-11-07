<?php

use App\Http\Middleware\EnsureTokenIsExists;
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
    return view('auth.signin');
});

// Login
Route::get('/login', [AuthController::class, 'signin_index']);
Route::post('/login/signin', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'signup_index']);
Route::POST('/register/signup', [AuthController::class, 'register']);

Route::middleware([EnsureTokenIsExists::class])->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::get('/profile', [UserController::class, 'index']);
    Route::get('/edit_profile', [UserController::class, 'edit_user_profile']);
    Route::patch('/edit_profile/update', [UserController::class, 'update_user_profile']);
    Route::patch('/profile/change_password', [UserController::class, 'change_user_password']);

    // Rekening
    Route::GET('/rekening', [RekeningController::class, 'index']);
    Route::GET('/rekening/create', [RekeningController::class, 'create_rekening']);
    Route::POST('/rekening/add', [RekeningController::class, 'add_rekening']);
    Route::GET('/edit_rekening/{id}', [RekeningController::class, 'edit_rekening']);
    Route::PATCH('/update_rekening/{id}', [RekeningController::class, 'update_rekening']);
    Route::DELETE('/rekening/delete/{id}', [RekeningController::class, 'delete_rekeningByid']);

    /**
     * View untuk budgeting
     */
    // TODO - cek lagi untuk FE
    Route::get('/budget/add', function () {
        return view('add_budgeting');
    });
    // TODO - cek lagi untuk FE
    Route::get('/budget', [BudgetingController::class, 'index']);
    // TODO - ganti ke view untuk edit selected user budgeting
    Route::get('/budget/edit', function () {
        return view('');
    });
    // TODO - ganti ke view untuk delete selected user budgeting
    Route::get('/budget/delete', function () {
        return view('');
    });

    /**
     * REST controller buat budget
     */
    Route::get('/user-budgeting', [BudgetingController::class, 'get_user_budgeting']);
    Route::post('/add-budget', [BudgetingController::class, 'add_budget']);
    Route::patch('/edit-budget/{id}', [BudgetingController::class, 'edit_budgeting']);
    Route::delete('/delete-budget/{id}', [BudgetingController::class, 'delete_budgeting']);

    // Saving Plan
    Route::get('/savingplan', function () {
        return view('savingplan');
    });

});
