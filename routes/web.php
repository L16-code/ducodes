<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HireDeveloperController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\LegalController;
use App\Http\Controllers\ServiceController;
// user routes
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/api/blogs', [HomeController::class, 'getBlogs'])->name('api.blogs');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [LegalController::class, 'terms'])->name('terms');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
// Service Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
// Hire Developer Routes
Route::get('/hire-developer/{slug}', [HireDeveloperController::class, 'show'])->name('hire.developer');
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