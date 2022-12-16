<?php

use Modules\VideoGallery\Http\Controllers\AdminVideoGalleryController;

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

// admin videogallery
Route::prefix('admin')->group(function () {
    Route::prefix('videogallery')->group(function () {
        Route::get('/', [AdminVideoGalleryController::class, 'index'])->name('admin.videogallery');
        Route::get('/show/{video}', [AdminVideoGalleryController::class, 'show'])->name('admin.videogallery.show');
        Route::get('/create', [AdminVideoGalleryController::class, 'create'])->name('admin.videogallery.create');
        Route::post('/store', [AdminVideoGalleryController::class, 'store'])->name('admin.videogallery.store');
        Route::get('/edit/{video}', [AdminVideoGalleryController::class, 'edit'])->name('admin.videogallery.edit');
        Route::put('/update/{video}', [AdminVideoGalleryController::class, 'update'])->name('admin.videogallery.update');
        Route::delete('/destroy/{video}', [AdminVideoGalleryController::class, 'destroy'])->name('admin.videogallery.destroy');
        Route::get('/status/{video}', [AdminVideoGalleryController::class, 'status'])->name('admin.videogallery.status');
    });
});


// videogallery
Route::prefix('videogallery')->group(function () {
    Route::get('/', 'VideoGalleryController@index');
});
