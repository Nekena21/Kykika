<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\StatusController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome');
});

// Routes sécurisées
Route::get('/control', [ControlController::class, 'index'])->middleware('auth');
Route::get('/status', [StatusController::class, 'index'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/send-command', [RobotController::class, 'sendCommand'])->middleware('auth');
Route::get('/status', [StatusController::class, 'index'])->middleware('auth');
