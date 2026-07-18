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
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FaqController;
// Serves files from storage/app/public directly, bypassing the need for a
// real storage:link symlink or Laravel's built-in signed-URL ServeFile
// mechanism — both proved unreliable on shared hosting without SSH access.
// Picks up new uploads automatically; nothing to re-sync after this.
Route::get('/storage/{path}', function (string $path) {
    $root = realpath(storage_path('app/public'));
    $fullPath = realpath(storage_path('app/public/'.$path));

    abort_unless($root && $fullPath && str_starts_with($fullPath, $root), 404);
    abort_unless(is_file($fullPath), 404);

    return response()->file($fullPath, [
        'Cache-Control' => 'public, max-age=604800',
    ]);
})->where('path', '.*')->name('storage.serve');

// user routes
Route::get('/', [HomeController::class, 'homepage'])->name('homepage');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
Route::get('/api/blogs', [HomeController::class, 'getBlogs'])->name('api.blogs');
Route::get('/blog/{slug}', [HomeController::class, 'blogDetails'])->name('blog.details');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.store');
Route::get('/privacy-policy', [LegalController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [LegalController::class, 'terms'])->name('terms');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/llms.txt', [SitemapController::class, 'llmsTxt'])->name('llms-txt');
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
    Route::post('/blog/upload-image', [BlogController::class, 'uploadContentImage'])->name('blog.upload-image');

    // CRM leads
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/create', [LeadController::class, 'create'])->name('leads.create');
    Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');
    Route::get('/leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
    Route::post('/leads/{lead}', [LeadController::class, 'update'])->name('leads.update');
    Route::post('/leads/{lead}/move', [LeadController::class, 'move'])->name('leads.move');
    Route::post('/leads/{lead}/delete', [LeadController::class, 'destroy'])->name('leads.destroy');

    // User management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.update-role');

    // FAQ management
    Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create', [FaqController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.edit');
    Route::post('/faqs/{faq}', [FaqController::class, 'update'])->name('faqs.update');
    Route::post('/faqs/{faq}/delete', [FaqController::class, 'destroy'])->name('faqs.destroy');
});
