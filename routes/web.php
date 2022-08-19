<?php

use App\Http\Controllers\CargoController;
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
    return view('home');
});

//IMPORT
Route::post('/import-cargo-details', [CargoController::class, 'import'])->name('import-cargo-details');

// GET DATA
Route::get('/pull-cargo-data', [CargoController::class, 'showList'])->name('pull-cargo-data');
// API
Route::get('/api/pull-data', [CargoController::class, 'pullData'])->name('api-pull-data');
