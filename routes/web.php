<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RekeningController;
use App\Http\Middleware\EnsureTokenIsExists;
use App\Http\Controllers\BudgetingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SavingPlanController;
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

Route::GET('/', function () {
    return view('auth.signin');
});

// Login
Route::GET('/login', [AuthController::class, 'signin_index']);
Route::POST('/login/signin', [AuthController::class, 'login']);

// Register
Route::GET('/register', [AuthController::class, 'signup_index']);
Route::POST('/register/signup', [AuthController::class, 'register']);

Route::middleware([EnsureTokenIsExists::class])->group(function () {

    /**
     * REST controller buat Route
     */

    // Dashboard
    Route::GET('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::GET('/profile', [UserController::class, 'index']);
    Route::GET('/profile/edit', [UserController::class, 'edit_profile']);
    Route::PATCH('/profile/update', [UserController::class, 'update_profile']);
    Route::PATCH('/profile/change_password', [UserController::class, 'change_user_password']);

    // Rekening
    Route::GET('/rekening', [RekeningController::class, 'index']);
    Route::GET('/rekening/create', [RekeningController::class, 'create_rekening']);
    Route::POST('/rekening/store', [RekeningController::class, 'store_rekening']);
    Route::GET('/rekening/edit/{id}', [RekeningController::class, 'edit_rekening']);
    Route::PATCH('/rekening/update/{id}', [RekeningController::class, 'update_rekening']);
    Route::DELETE('/rekening/delete/{id}', [RekeningController::class, 'delete_rekening']);

    // Budgeting
    Route::GET('/budgeting', [BudgetingController::class, 'index']);
    Route::GET('/budgeting/create', [BudgetingController::class, 'get_user_budgeting']);
    Route::POST('/budgeting/store', [BudgetingController::class, 'add_budget']);
    Route::PATCH('/budgeting/update/{id}', [BudgetingController::class, 'edit_budgeting']);
    Route::DELETE('/budgeting/delete/{id}', [BudgetingController::class, 'delete_budgeting']);

    // Saving Plan
    Route::GET('/saving-plan', [SavingPlanController::class, 'index']);
    Route::GET('/saving-plan/create', [SavingPlanController::class, 'create_saving_plan']);
    Route::POST('/saving-plan/store', [SavingPlanController::class, 'store_saving_plan']);
    Route::GET('/saving-plan/edit/{id}', [SavingPlanController::class, 'edit_saving_plan']);
    Route::PATCH('/saving-plan/update/{id}', [SavingPlanController::class, 'update_saving_plan']);
    Route::PATCH('/saving-plan/add-amount/{id}', [SavingPlanController::class, 'add_amount_saving_plan']);
    Route::DELETE('/saving-plan/delete/{id}', [SavingPlanController::class, 'delete_saving_plan']);
    
    // Logout
    Route::POST('/logout', [AuthController::class, 'logout']);

});
