<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MarketplaceController;
use App\Http\Controllers\roomController;
use App\Http\Controllers\TictactoeController;
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
    return redirect()->route('register');
});

// Route::namespace('App\Http\Controllers')->group(function() {

// });

Route::middleware('guest')->group(function(){
    Route::get('/register', [AuthController::class, 'create_register'])->name('register');
    Route::post('/register', [AuthController::class, 'store_register'])->name('register.store');
    // Route::post('/register', [AuthController::class, 'store_capture'])->name('register.capture');
    Route::get('/login', [AuthController::class, 'create_login'])->name('login');
    Route::post('/login', [AuthController::class, 'store_login'])->name('login.store');
});
Route::middleware('auth')->group(function(){
    Route::get('/home', [roomController::class, 'home'])->name('home');
    Route::post('/home', [roomController::class, 'logout'])->name('logout');
    Route::get('/tictactoe/{room}', [TictactoeController::class, 'index'])->name('tictactoe');
    Route::post('/turn', [TictactoeController::class, 'turn'])->name('turn');
    Route::get('/marketplace', [MarketplaceController::class, 'index'])->name('marketplace');
});
