<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
use  App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Route::get('/dollar', [RateController::class, 'index'])->name('dollar.index');
Route::post('/dollar',[RateController::class,'store'])->name('dollar.store');

Route::get('/euro', [RateController::class, 'euroIndex'])->name('euro.index');
Route::post('/euro',[RateController::class,'euroStore'])->name('euro.store');

Route::get('/ruble', [RateController::class, 'rubleIndex'])->name('ruble.index');
Route::post('/ruble',[RateController::class,'rubleStore'])->name('ruble.store');


Route::get('/home', [HomeController::class, 'index'])->name('home');
