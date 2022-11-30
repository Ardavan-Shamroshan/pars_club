<?php

use Modules\PostCategory\Http\Controllers\AdminPostCategoryController;
use Modules\PostCategory\Http\Controllers\PostCategoryController;

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


// admin post category
Route::prefix('admin')->group(function () {
    Route::prefix('postcategory')->group(function () {
        Route::get('/', [AdminPostCategoryController::class, 'index'])->name('admin.postcategory.index');
    });
});

// post category
Route::prefix('postcategory')->group(function () {
    Route::get('/', [PostCategoryController::class, 'index'])->name('postcategory.index');
});
