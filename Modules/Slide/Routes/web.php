<?php

use Modules\Slide\Http\Controllers\AdminSlideController;

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

// admin slide
Route::prefix('admin')->group(function () {
    Route::prefix('slide')->group(function () {
        Route::get('/', [AdminSlideController::class, 'index'])->name('admin.slide');
        Route::get('/create', [AdminSlideController::class, 'create'])->name('admin.slide.create');
        Route::post('/store', [AdminSlideController::class, 'store'])->name('admin.slide.store');
        Route::get('/edit/{slide}', [AdminSlideController::class, 'edit'])->name('admin.slide.edit');
        Route::put('/update/{slide}', [AdminSlideController::class, 'update'])->name('admin.slide.update');
        Route::delete('/destroy/{slide}', [AdminSlideController::class, 'destroy'])->name('admin.slide.destroy');
        Route::get('/status/{slide}', [AdminSlideController::class, 'status'])->name('admin.slide.status');
    });
});


// slide
Route::prefix('slide')->group(function () {
    Route::get('/', 'SlideController@index');
});
