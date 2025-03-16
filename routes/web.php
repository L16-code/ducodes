<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
Route::get('/',[HomeController::class,'homepage'])->name('homepage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/home',[HomeController::class,'index'])->name('home');
