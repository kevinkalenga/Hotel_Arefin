<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard');
Route::get('/login', [WebsiteController::class, 'login'])->name('login');
Route::get('/registration', [WebsiteController::class, 'registration'])->name('registration');
Route::get('/forget-password', [WebsiteController::class, 'forget_password'])->name('forget_password');
