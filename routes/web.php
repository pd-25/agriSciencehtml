<?php

use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/articles', [IndexController::class, 'articles'])->name('articles');
Route::get('/articles/{slug}', [IndexController::class, 'blogShow'])->name('blogs.show');
Route::get('/contactus', [IndexController::class, 'contactus'])->name('contactus');
Route::post('/contactus', [IndexController::class, 'inquiryStore'])->name('inquiry.store');
Route::get('/researches', [IndexController::class, 'researches'])->name('researches');
Route::get('/services', [IndexController::class, 'services'])->name('services');

// Artisan Commands Routes
Route::get('/optimize', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize');
    return 'Application optimized successfully!';
});

Route::get('/migrate', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    return 'Database migrated successfully!';
});

Route::get('/config-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    return 'Configuration cached successfully!';
});

Route::get('/config-clear', function () {
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    return 'Configuration cleared successfully!';
});

Route::get('/optimize-clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Optimization cleared successfully!';
});

Route::get('/storage-link', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Storage linked successfully!';
});

require __DIR__ . '/admin.php';