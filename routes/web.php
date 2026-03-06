<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard')->middleware('auth');


Route::get('/login', [WebsiteController::class, 'login'])->name('login');
Route::post('/login-submit', [WebsiteController::class, 'login_submit'])->name('login_submit');
Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');
Route::get('/registration', [WebsiteController::class, 'registration'])->name('registration');
Route::post('/registration-submit', [WebsiteController::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration/verify/{token}/{email}', [WebsiteController::class, 'registration_verify']);
Route::get('/forget-password', [WebsiteController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password-submit', [WebsiteController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [WebsiteController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password-submit/{token}/{email}', [WebsiteController::class, 'reset_password_submit'])->name('Reset_password_submit');


/* Admin */ 

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin_login');
Route::post('/admin/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard')->middleware('admin:admin');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin_settings')->middleware('admin:admin');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin_logout');
