<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyfinalController;
use App\Http\Controllers\MylineController;
use App\Http\Controllers\MyscoreController;
use App\Http\Controllers\SportsListController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::get('/', [WelcomeController::class, 'list'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
/**
 * ======================================
 *       Routes for Sports List Menu
 * ======================================
 */
Route::prefix('sports')->group(function () {
    Route::get('/', [SportsListController::class, 'index']);
    Route::get('/leagues', [SportsListController::class, 'showLeagues']);
    Route::get('/nfl', [SportsListController::class, 'showNfl']);
    Route::get('/basketball', [SportsListController::class, 'showBasketball']);
    Route::get('/baseball', [SportsListController::class, 'showBaseball']);
    Route::get('/hockey', [SportsListController::class, 'showHockey']);
    Route::get('/fighting', [SportsListController::class, 'showFighting']);
    Route::get('/soccer', [SportsListController::class, 'showSoccer']);
});

/**
 * ======================================
 *              Needs Update
 * ======================================
 */
Route::get('/mylines', [MylineController::class, 'list'])->name('myline');
Route::get('/myscore', [MyscoreController::class, 'list'])->name('myscore');
Route::get('/myfinal', [MyfinalController::class, 'list'])->name('myfinal');
/**
 * ======================================
 *              Test Routes
 * ======================================
 */
Route::get('/test-navbar', [MyfinalController::class, 'test_navbar']);
Route::get('/test-token', [ApiAuthController::class, 'authenticate']);
