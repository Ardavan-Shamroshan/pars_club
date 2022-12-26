<?php

use Modules\Role\Http\Controllers\AdminRoleController;

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

// admin role
Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    Route::prefix('role')->group(function () {
        Route::get('/', [AdminRoleController::class, 'index'])->name('admin.role');
        Route::get('/create', [AdminRoleController::class, 'create'])->name('admin.role.create');
        Route::post('/store', [AdminRoleController::class, 'store'])->name('admin.role.store');
        Route::get('/edit/{role}', [AdminRoleController::class, 'edit'])->name('admin.role.edit');
        Route::delete('/destroy/{role}', [AdminRoleController::class, 'destroy'])->name('admin.role.destroy');
    });
});


// role
Route::prefix('role')->group(function() {
    Route::get('/', 'RoleController@index');
});
