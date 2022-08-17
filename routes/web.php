<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
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

Route::get('/', function () {
	return redirect('/series');
});

Route::controller(SeriesController::class)->group(function () {
	Route::get('/series', 'index')->name('series.index');
	Route::get('/series/create', 'create')->name('series.create');
    Route::get('/series/{series}/edit', 'edit')->name('series.edit');
	Route::post('/series/store', 'store')->name('series.store');
	Route::delete('/series/{series}/destroy', 'destroy')->name('series.destroy');
    Route::put('/series/{series}/update', 'update')->name('series.update');
});

Route::controller(EpisodesController::class)->group(function () {
	Route::get('/seasons/{season}/episodes', 'index')->name('episodes.index');
	Route::post('/seasons/{season}/episodes', 'update')->name('episodes.update');
});

Route::controller(SeasonsController::class)->group(function () {
	Route::get('/series/{series}/seasons', 'index')->name('seasons.index');
});
