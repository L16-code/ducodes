<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/blogs',[BlogController::class,'add_blog'])->name('blogs');
Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');