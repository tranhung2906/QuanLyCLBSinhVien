<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\MemberController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('show-login');
Route::post('/check-login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//Admin
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin-profile', [AdminController::class, 'showProfile'])->name('admin.profile');
    Route::get('/accounts', [AccountController::class, 'index'])->name('admin.account');
    Route::get('/account-edit/{id}', [AccountController::class, 'edit'])->name('admin.account-edit');
    Route::post('/account-update/{id}', [AccountController::class, 'update'])->name('admin.account-update');
    Route::post('/reset-password/{id}', [AccountController::class, 'resetPassword'])->name('admin.reset-password');
    //Member
    Route::get('/member-create', [MemberController::class, 'create'])->name('admin.member-create');
    Route::get('/members', [MemberController::class, 'index'])->name('admin.member');
    Route::post('/member-store', [MemberController::class, 'store'])->name('admin.member-store');
    Route::get('/member-edit/{id}', [MemberController::class, 'edit'])->name('admin.member-edit');
    Route::post('/member-update/{id}', [MemberController::class, 'update'])->name('admin.member-update');
    Route::delete('/member-delete/{id}', [MemberController::class, 'delete'])->name('admin.member-delete');
    //Club
    Route::get('/clubs', [ClubController::class, 'index'])->name('admin.club');
    Route::get('/club-edit/{id}', [ClubController::class, 'edit'])->name('admin.club-edit');
    Route::post('/club-update/{id}', [ClubController::class, 'update'])->name('admin.club-update');
});
