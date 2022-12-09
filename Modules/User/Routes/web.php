<?php

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


use Modules\User\Http\Controllers\AdminUserController;


Route::prefix('admin')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::get('/edit/{user}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::delete('/destroy/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('/activate/{user}', [AdminUserController::class, 'activate'])->name('admin.user.activate');
    });
});


Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index');
});
