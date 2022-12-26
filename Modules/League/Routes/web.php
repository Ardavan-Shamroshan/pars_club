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

// admin
Route::middleware('auth', 'admin')->prefix('adminity')->group(function () {
    // league
    Route::prefix('league')->group(function () {
        Route::get('/', [AdminLeagueController::class, 'index'])->name('admin.league');
        Route::get('/create', [AdminLeagueController::class, 'create'])->name('admin.league.create');
        Route::post('/store', [AdminLeagueController::class, 'store'])->name('admin.league.store');
        Route::get('/edit/{league}', [AdminLeagueController::class, 'edit'])->name('admin.league.edit');
        Route::put('/update/{league}', [AdminLeagueController::class, 'update'])->name('admin.league.update');
        Route::delete('/destroy/{league}', [AdminLeagueController::class, 'destroy'])->name('admin.league.destroy');
    });
    // league team
    Route::prefix('league-team')->group(function () {
        Route::get('/', [AdminLeagueTeamController::class, 'index'])->name('admin.league-team');
        Route::get('/create', [AdminLeagueTeamController::class, 'create'])->name('admin.league-team.create');
        Route::post('/store', [AdminLeagueTeamController::class, 'store'])->name('admin.league-team.store');
        Route::get('/edit/{team}', [AdminLeagueTeamController::class, 'edit'])->name('admin.league-team.edit');
        Route::put('/update/{team}', [AdminLeagueTeamController::class, 'update'])->name('admin.league-team.update');
        Route::delete('/destroy/{team}', [AdminLeagueTeamController::class, 'destroy'])->name('admin.league-team.destroy');
    });
});

// league
Route::prefix('league')->group(function () {
    Route::get('/', 'LeagueController@index');
});
