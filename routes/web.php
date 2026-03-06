<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/dashboard-user', [WebsiteController::class, 'dashboard_user'])->name('dashboard_user')->middleware('auth');
Route::get('/dashboard-admin', [WebsiteController::class, 'dashboard_admin'])->name('dashboard_admin')->middleware('admin');
Route::get('/settings', [WebsiteController::class, 'settings'])->name('settings')->middleware('admin');

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
