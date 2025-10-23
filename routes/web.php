<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('show-login');
Route::post('/check-login', [AuthController::class, 'login'])->name('login');
