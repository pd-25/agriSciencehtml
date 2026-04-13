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
require __DIR__ . '/admin.php';