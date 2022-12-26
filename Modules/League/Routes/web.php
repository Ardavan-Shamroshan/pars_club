<?php

use Modules\League\Http\Controllers\AdminLeagueController;
use Modules\League\Http\Controllers\AdminLeagueTeamController;
use Modules\League\Http\Controllers\AdminTeamResultController;

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

// admin league
Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    Route::prefix('league')->group(function () {
        Route::get('/', [AdminLeagueController::class, 'index'])->name('admin.league');
        Route::get('/create', [AdminLeagueController::class, 'create'])->name('admin.league.create');
        Route::post('/store', [AdminLeagueController::class, 'store'])->name('admin.league.store');
        Route::get('/edit/{league}', [AdminLeagueController::class, 'edit'])->name('admin.league.edit');
        Route::put('/update/{league}', [AdminLeagueController::class, 'update'])->name('admin.league.update');
        Route::delete('/destroy/{league}', [AdminLeagueController::class, 'destroy'])->name('admin.league.destroy');
    });
});

// league
Route::prefix('league')->group(function () {
    Route::get('/', 'LeagueController@index');
});
