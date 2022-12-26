<?php

use Modules\Permission\Http\Controllers\AdminPermissionController;

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

// admin permission
Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    Route::prefix('permission')->group(function () {
        Route::get('/', [AdminPermissionController::class, 'index'])->name('admin.permission');
        Route::get('/create', [AdminPermissionController::class, 'create'])->name('admin.permission.create');
        Route::post('/store', [AdminPermissionController::class, 'store'])->name('admin.permission.store');
        Route::get('/edit/{permission}', [AdminPermissionController::class, 'edit'])->name('admin.permission.edit');
        Route::delete('/destroy/{permission}', [AdminPermissionController::class, 'destroy'])->name('admin.permission.destroy');
    });
});

// permission
Route::prefix('permission')->group(function () {
    Route::get('/', 'PermissionController@index');
});
