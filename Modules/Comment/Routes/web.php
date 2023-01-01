<?php

use Modules\Comment\Http\Controllers\AdminCommentController;
use Modules\Comment\Http\Controllers\CommentController;

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

// admin comment
Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    Route::prefix('comment')->group(function () {
        Route::get('/', [AdminCommentController::class, 'index'])->name('admin.comment');
        Route::get('/show/{comment}', [AdminCommentController::class, 'show'])->name('admin.comment.show');
        Route::delete('/destroy/{comment}', [AdminCommentController::class, 'destroy'])->name('admin.comment.destroy');
        Route::post('/answer/{comment}', [AdminCommentController::class, 'answer'])->name('admin.comment.answer');
        Route::get('/approve/{comment}', [AdminCommentController::class, 'approve'])->name('admin.comment.approve');
    });
});

// comment
Route::prefix('comment')->group(function () {
    Route::post('/store/{post:slug}', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('comment.answer');
});
