<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// login
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // user detail
    Route::get('/user', [App\Http\Controllers\AuthController::class, 'user']);
    
    // card
    Route::get('/card', [App\Http\Controllers\CardController::class, 'index'])->name('card.index');
    Route::post('/card', [App\Http\Controllers\CardController::class, 'create'])->name('card.create');
    Route::get('/card/{id}', [App\Http\Controllers\CardController::class, 'show'])->name('card.show');
    Route::delete('/card/{id}', [App\Http\Controllers\CardController::class, 'destroy'])->name('card.delete');
    Route::put('/setpin/{id}', [App\Http\Controllers\CardController::class, 'set_pin'])->name('card.setpin');

    Route::get('/transaction', [App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.index');

    // logout
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
});

