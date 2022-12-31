<?php

use Modules\Auth\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login-register', [AuthController::class, 'loginRegisterForm'])->name('auth.login-register-form');
Route::middleware('throttle:user-login-register-limiter')->post('login-register', [AuthController::class, 'loginRegister'])->name('auth.login-register');
Route::get('login-confirm/{token}', [AuthController::class, 'loginConfirmForm'])->name('auth.login-confirm-form');
Route::middleware('throttle:user-login-confirm-limiter')->post('login-confirm/{token}', [AuthController::class, 'loginConfirm'])->name('auth.login-confirm');
Route::middleware('throttle:user-login-resend-otp-limiter')->get('login-resend-otp/}{token}', [AuthController::class, 'loginResendOtp'])->name('auth.login-resend-otp');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
