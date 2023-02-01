<?php

use App\Http\Controllers\UserControllerr;
use Illuminate\Support\Facades\Route;



Route::get('/', [UserControllerr::class , 'index'])->name('home');
Route::get('/dashboard', [UserControllerr::class , 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/login', [UserControllerr::class , 'login'])->name('login');
Route::post('/login_submit',[UserControllerr::class, 'login_submit'])->name('login_submit');

Route::get('/registration', [UserControllerr::class , 'registration'])->name('registration');
Route::post('/registration_submit', [UserControllerr::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration/verify/{t}/{e}', [UserControllerr::class , 'registration_verify']);

Route::get('/forget_password', [UserControllerr::class , 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit', [UserControllerr::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset/password/{t}/{e}', [UserControllerr::class, 'reset_password']);
Route::post('/reset_password_submit', [UserControllerr::class, 'reset_password_submit'])->name('reset_password_submit');

Route::get('/logout', [UserControllerr::class , 'logout'])->name('logout')->middleware('auth');