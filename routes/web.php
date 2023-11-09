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
    // Logout
    Route::POST('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::GET('/dashboard', [DashboardController::class, 'index']);

    // Profile
    Route::GET('/profile', [UserController::class, 'index']);
    Route::GET('/edit_profile', [UserController::class, 'edit_user_profile']);
    Route::PATCH('/edit_profile/update', [UserController::class, 'update_user_profile']);
    Route::PATCH('/profile/change_password', [UserController::class, 'change_user_password']);

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
    Route::GET('/budgeting', [BudgetingController::class, 'index']);
    Route::GET('/user-budgeting', [BudgetingController::class, 'get_user_budgeting']);
    Route::POST('/add-budget', [BudgetingController::class, 'add_budget']);
    Route::PATCH('/edit-budget/{id}', [BudgetingController::class, 'edit_budgeting']);
    Route::DELETE('/delete-budget/{id}', [BudgetingController::class, 'delete_budgeting']);

    // Saving Plan
    Route::GET('/saving-plan', [SavingPlanController::class, 'index']);
    Route::GET('/saving-plan/create', [SavingPlanController::class, 'create_saving_plan']);
    Route::POST('/saving-plan/store', [SavingPlanController::class, 'store_saving_plan']);
    Route::GET('/saving-plan/edit/{id}', [SavingPlanController::class, 'edit_saving_plan']);
    Route::PATCH('/saving-plan/update/{id}', [SavingPlanController::class, 'update_saving_plan']);
    Route::PATCH('/saving-plan/add-amount/{id}', [SavingPlanController::class, 'add_amount_saving_plan']);
    Route::DELETE('/saving-plan/delete/{id}', [SavingPlanController::class, 'delete_saving_plan']);

});
