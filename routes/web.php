<?php

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

use App\Http\Controllers\RentRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    dd(Auth::user());
    return 'home page for ' . Auth::user();
})
    ->name('home')
    ->middleware('auth');

Route::middleware('auth')
    ->group(function () {
        Route::get('/rent/requests', [RentRequestController::class, 'index'])
            ->name('rent.requests.index');
    });

Route::middleware('guest')
    ->group(function () {
        Route::post('/rent/requests', [RentRequestController::class, 'store'])
            ->name('rent.requests.store');
    });
