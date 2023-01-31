<?php

use App\Http\Controllers\UserControllerr;
use Illuminate\Support\Facades\Route;



Route::get('/', [UserControllerr::class , 'index'])->name('home');
Route::get('/dashboard', [UserControllerr::class , 'dashboard'])->name('dashboard');
Route::get('/login', [UserControllerr::class , 'login'])->name('login');
Route::get('/registration', [UserControllerr::class , 'registration'])->name('registration');
Route::get('/forget_password', [UserControllerr::class , 'forget_password'])->name('forget_password');