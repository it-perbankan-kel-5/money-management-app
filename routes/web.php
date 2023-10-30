<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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



// Route::post('/login', function () {
// });
// Route::get('/login', function () {
//     return view('api.signin');
// });

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login/signin', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);



Route::get('/register', function () {
    return view('api.signup');
});
Route::get('/budgetin', function () {
    return view('budgetin');
});