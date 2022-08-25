<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
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
})->middleware(Authenticator::class);

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

Route::controller(LoginController::class)->group(function () {
	Route::get('/login', 'index')->name('login');
	Route::post('/login', 'login');
	Route::get('/logout', 'destroy')->name('logout');
});

Route::controller(UsersController::class)->group(function () {
	Route::get('/users/create', 'create')->name('users.create');
	Route::post('/users', 'store')->name('users.store');
});
