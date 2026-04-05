<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;

Route::prefix('admin')->name('admin.')->group(function () {

    // Guest routes (login)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });

    // Protected routes (require admin auth)
    Route::middleware('admin')->group(function () {
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Members
        Route::get('/members', [AdminController::class, 'membersList'])->name('members.index');
        Route::post('/members', [AdminController::class, 'memberstore'])->name('members.store');
        Route::put('/members/{member}', [AdminController::class, 'memberUpdate'])->name('members.update');
        Route::delete('/members/{member}', [AdminController::class, 'memberDelete'])->name('members.delete');

         // Partners
        Route::get('/partners', [AdminController::class, 'partnersList'])->name('partners.index');
        Route::post('/partners', [AdminController::class, 'partnerstore'])->name('partners.store');
        Route::put('/partners/{partner}', [AdminController::class, 'partnerUpdate'])->name('partners.update');
        Route::delete('/partners/{partner}', [AdminController::class, 'partnerDelete'])->name('partners.delete');

         // Lead
        Route::get('/leads', [AdminController::class, 'leadsList'])->name('leads.index');
        Route::post('/leads', [AdminController::class, 'leadstore'])->name('leads.store');
        Route::put('/leads/{lead}', [AdminController::class, 'leadUpdate'])->name('leads.update');
        Route::delete('/leads/{lead}', [AdminController::class, 'leadDelete'])->name('leads.delete');



        // Events
        Route::get('/services', [AdminController::class, 'servicesList'])->name('services.index');
        Route::post('/services', [AdminController::class, 'servicestore'])->name('services.store');
        Route::put('/services/{service}', [AdminController::class, 'serviceUpdate'])->name('services.update');
        Route::delete('/services/{service}', [AdminController::class, 'serviceDelete'])->name('services.delete');

        // Latest News
        Route::get('/articles', [AdminController::class, 'latestNewsList'])->name('articles.index');
        Route::post('/articles', [AdminController::class, 'latestNewsStore'])->name('articles.store');
        Route::put('/articles/{latestNews}', [AdminController::class, 'latestNewsUpdate'])->name('articles.update');
        Route::patch('/articles/{latestNews}/toggle', [AdminController::class, 'latestNewsToggle'])->name('articles.toggle');
        Route::delete('/articles/{latestNews}', [AdminController::class, 'latestNewsDelete'])->name('articles.delete');

        // researches
        Route::get('/researches', [AdminController::class, 'researchesList'])->name('researches.index');
        Route::post('/researches', [AdminController::class, 'researchestore'])->name('researches.store');
        Route::put('/researches/{research}', [AdminController::class, 'researchUpdate'])->name('researches.update');
        Route::delete('/researches/{research}', [AdminController::class, 'researchDelete'])->name('researches.delete');

        // researches
        Route::get('/researchesPiller', [AdminController::class, 'researchesPillerList'])->name('researchesPiller.index');
        Route::post('/researchesPiller', [AdminController::class, 'researchesPillertore'])->name('researchesPiller.store');
        Route::put('/researchesPiller/{research}', [AdminController::class, 'researchUpdate'])->name('researchesPiller.update');
        Route::delete('/researchesPiller/{research}', [AdminController::class, 'researchDelete'])->name('researchesPiller.delete');

        Route::put('/site-setting', [AdminController::class, 'siteSettingUpdate'])->name('site-setting');


                // Faq
        Route::get('/faqs', [AdminController::class, 'faqsList'])->name('faqs.index');
        Route::post('/faqs', [AdminController::class, 'faqstore'])->name('faqs.store');
        Route::put('/faqs/{faq}', [AdminController::class, 'faqUpdate'])->name('faqs.update');
        Route::delete('/faqs/{faq}', [AdminController::class, 'faqDelete'])->name('faqs.delete');

               // Testimonials
        Route::get('/testimonials', [AdminController::class, 'testimonialsList'])->name('testimonials.index');
        Route::post('/testimonials', [AdminController::class, 'testimonialstore'])->name('testimonials.store');
        Route::put('/testimonials/{testimonial}', [AdminController::class, 'testimonialUpdate'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonial}', [AdminController::class, 'testimonialDelete'])->name('testimonials.delete');
    });
});
