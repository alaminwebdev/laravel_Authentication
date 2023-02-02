<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// for users
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login_submit', [UserController::class, 'login_submit'])->name('login_submit');

Route::get('/registration', [UserController::class, 'registration'])->name('registration');
Route::post('/registration_submit', [UserController::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration/verify/{t}/{e}', [UserController::class, 'registration_verify']);

Route::get('/forget_password', [UserController::class, 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit', [UserController::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset/password/{t}/{e}', [UserController::class, 'reset_password']);
Route::post('/reset_password_submit', [UserController::class, 'reset_password_submit'])->name('reset_password_submit');

Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

// for admin
Route::get('admin/login', [AdminController::class , 'admin_login'])->name('admin_login');
Route::post('admin_login_submit', [AdminController::class, 'admin_login_submit'])->name('admin_login_submit');
Route::get('admin/dashboard', [AdminController::class , 'admin_dashboard'])->name('admin_dashboard')->middleware('admin:admin');
Route::get('admin/settings', [AdminController::class , 'admin_settings'])->name('admin_settings')->middleware('admin:admin');
Route::get('/admin/logout', [AdminController::class, 'admin_logout'])->name('admin_logout')->middleware('admin:admin');