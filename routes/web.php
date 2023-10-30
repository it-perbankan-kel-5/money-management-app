<?php

use App\Http\Controllers\Example\RequestController;
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

Route::get('/', function () {
    return view('components.layout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('api.signin');
});

Route::get('/register', function () {
    return view('api.signup');
});


/**
 * Example
 */

Route::get('/request-login', [RequestController::class, 'login']);
Route::get('/request-logout', [RequestController::class, 'logout']);

Route::get('/request-post', [RequestController::class, 'postRequest']);
Route::get('/request-patch', [RequestController::class, 'patchRequest']);
Route::get('/request-delete', [RequestController::class, 'deleteRequest']);
Route::get('/request-retrieve', [RequestController::class, 'getRequest']);

Route::get('/request-success', function () {
    return view('api.process_success');
})->name('request-success');

Route::get('/request-field-error', function () {
    return view('api.field_error');
})->name('request-field-error');


Route::get('/request-error', function () {
   return view('api.process_error');
})->name('request-error');
