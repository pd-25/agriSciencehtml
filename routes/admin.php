<?php

use App\Http\Controllers\Admin\OurPurposeController;
use App\Http\Controllers\Admin\ResearchController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ImpactNumbersController;
use App\Http\Controllers\Admin\ApproachController;
use App\Http\Controllers\Admin\ResearchNumberController;
use App\Http\Controllers\Admin\PublicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\WhatWeDoController;

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

        // What we do
        Route::get('/whatwedo', [WhatWeDoController::class, 'index'])->name('whatwedo.index');
        Route::post('/whatwedo', [WhatWeDoController::class, 'store'])->name('whatwedo.store');
        Route::put('/whatwedo/{id}', [WhatWeDoController::class, 'update'])->name('whatwedo.update');
        Route::delete('/whatwedo/{id}', [WhatWeDoController::class, 'destroy'])->name('whatwedo.destroy');

        // Service
        Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
        Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
        Route::put('/service/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

        // Our Purpose
        Route::get('/ourpurpose', [OurPurposeController::class, 'index'])->name('ourpurpose.index');
        Route::post('/ourpurpose', [OurPurposeController::class, 'store'])->name('ourpurpose.store');
        Route::put('/ourpurpose/{id}', [OurPurposeController::class, 'update'])->name('ourpurpose.update');
        Route::delete('/ourpurpose/{id}', [OurPurposeController::class, 'destroy'])->name('ourpurpose.destroy');

        // Research
        Route::get('/research', [ResearchController::class, 'index'])->name('research.index');
        Route::post('/research', [ResearchController::class, 'store'])->name('research.store');
        Route::put('/research/{id}', [ResearchController::class, 'update'])->name('research.update');
        Route::delete('/research/{id}', [ResearchController::class, 'destroy'])->name('research.destroy');


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

        // Impact Numbers
        Route::get('/impact-numbers', [ImpactNumbersController::class, 'index'])->name('impactnumbers.index');
        Route::post('/impact-numbers', [ImpactNumbersController::class, 'store'])->name('impactnumbers.store');
        Route::put('/impact-numbers/{id}', [ImpactNumbersController::class, 'update'])->name('impactnumbers.update');

        // Approach
        Route::get('/approach', [ApproachController::class, 'index'])->name('approach.index');
        Route::post('/approach', [ApproachController::class, 'store'])->name('approach.store');
        Route::put('/approach/{id}', [ApproachController::class, 'update'])->name('approach.update');
        Route::delete('/approach/{id}', [ApproachController::class, 'destroy'])->name('approach.destroy');

        // Research Numbers
        Route::get('/research-numbers', [ResearchNumberController::class, 'index'])->name('research-numbers.index');
        Route::post('/research-numbers', [ResearchNumberController::class, 'store'])->name('research-numbers.store');
        Route::put('/research-numbers/{id}', [ResearchNumberController::class, 'update'])->name('research-numbers.update');

        // Publications
        Route::get('/publications', [PublicationController::class, 'index'])->name('publications.index');
        Route::post('/publications', [PublicationController::class, 'store'])->name('publications.store');
        Route::put('/publications/{id}', [PublicationController::class, 'update'])->name('publications.update');
        Route::delete('/publications/{id}', [PublicationController::class, 'destroy'])->name('publications.destroy');
    });
});
