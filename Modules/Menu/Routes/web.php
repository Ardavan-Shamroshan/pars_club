<?php

use Modules\Menu\Http\Controllers\AdminMenuController;

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

// admin menu
Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    Route::prefix('menu')->group(function () {
        Route::get('/', [AdminMenuController::class, 'index'])->name('admin.menu');
        Route::get('/create', [AdminMenuController::class, 'create'])->name('admin.menu.create');
        Route::post('/store', [AdminMenuController::class, 'store'])->name('admin.menu.store');
        Route::get('/show/{menu}', [AdminMenuController::class, 'show'])->name('admin.menu.show');
        Route::get('/edit/{menu}', [AdminMenuController::class, 'edit'])->name('admin.menu.edit');
        Route::put('/update/{menu}', [AdminMenuController::class, 'update'])->name('admin.menu.update');
        Route::delete('/destroy/{menu}', [AdminMenuController::class, 'destroy'])->name('admin.menu.destroy');
        Route::get('/status/{menu}', [AdminMenuController::class, 'status'])->name('admin.menu.status');
        // manage menus
//        Route::get('manage-menus/{id?}',[AdminMenuController::class,'index'])->name('admin.menu.manage-menus');
//        Route::post('create-menu',[AdminMenuController::class,'store'])->name('admin.menu.create-menu');

    });
});


// menu
Route::prefix('menu')->group(function() {
    Route::get('/', 'MenuController@index');
});
