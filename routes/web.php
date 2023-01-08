<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\DashboardController;
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
Route::get('/sanctum/token', [ApiController::class, 'token'])->name('sanctum.token');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/database-dump', [DashboardController::class, 'databaseDump'])->name('database-dump');
Route::resources([
    'columns' => ColumnController::class,
    'cards' => CardController::class,
]);
Route::put('/cards/{card}/columns/{column}', [CardController::class, 'updateColumn'])->name('cards.updateColumn');
Route::post('/columns/update', [ColumnController::class, 'updateColumns'])->name('columns-update');

//Route::resource('cards', CardController::class);
//Route::resource('columns', ColumnController::class);
