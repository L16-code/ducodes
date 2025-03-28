<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware\AdminMiddleware;
// user routes
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
// route for user login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/404', [HomeController::class, 'error_page'])->name('404');
});

// Admin Routes Group
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/blogs', [BlogController::class, 'add_blog'])->name('blogs');
    Route::get('/blog-listing', [BlogController::class, 'blog_listing'])->name('blog-listing');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/data', [BlogController::class, 'getBlogsData'])->name('blogs.data');
    Route::post('/blog/status/update', [BlogController::class, 'updateStatus'])->name('blog.status.update');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
});