<?php

use Modules\ContactUs\Http\Controllers\AdminContactUsController;
use Modules\ContactUs\Http\Controllers\ContactUsController;

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

// admin contact us
Route::middleware('auth', 'admin')->prefix('admin')->group(function () {
    Route::prefix('contact-us')->group(function () {
        Route::get('/', [AdminContactUsController::class, 'index'])->name('admin.contact-us');
        Route::get('/show/{contact}', [AdminContactUsController::class, 'show'])->name('admin.contact-us.show');
        Route::get('/store', [AdminContactUsController::class, 'store'])->name('admin.contact-us.store');
        Route::get('/edit/{contact}', [AdminContactUsController::class, 'edit'])->name('admin.contact-us.edit');
        Route::put('/update/{contact}', [AdminContactUsController::class, 'update'])->name('admin.contact-us.update');
        Route::delete('/destroy/{contact}', [AdminContactUsController::class, 'destroy'])->name('admin.contact-us.destroy');
    });
});

// contact us
Route::prefix('contact-us')->group(function () {
    Route::get('/', [ContactUsController::class, 'index'])->name('contact-us');
});
