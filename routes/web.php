<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WebpageController;
use Illuminate\Support\Facades\Route;

// Public Website Routes
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/story', [PageController::class, 'story'])->name('story');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/franchise', [PageController::class, 'franchise'])->name('franchise');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::post('/order', [PageController::class, 'submitOrder'])->name('order.submit');
Route::post('/franchise', [PageController::class, 'submitFranchise'])->name('franchise.submit');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

// Dashboard & Auth Protected Routes
Route::get('/dashboard', function () {
    return view('admin.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Modular Routes Group
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
     
    Route::get('/website-pages', [WebpageController::class, 'index'])->name('website-pages.index');
    Route::get('/website-pages/home', [WebpageController::class, 'home'])->name('website-pages.home');
    Route::post('/website-pages/home/hero', [WebpageController::class, 'updateHero'])->name('website-pages.home.hero.update');
    Route::post('/website-pages/home/highlights', [WebpageController::class, 'updateHighlights'])->name('website-pages.home.highlights.update');
    Route::post('/website-pages/home/welcome', [WebpageController::class, 'updateWelcome'])->name('website-pages.home.welcome.update');
    Route::post('/website-pages/home/why-gpo', [WebpageController::class, 'updateWhyGpo'])->name('website-pages.home.why_gpo.update');
    Route::post('/website-pages/home/star-dish', [WebpageController::class, 'updateStarDish'])->name('website-pages.home.star_dish.update');
    Route::post('/website-pages/home/experience', [WebpageController::class, 'updateExperience'])->name('website-pages.home.experience.update');
    Route::post('/website-pages/home/visit-us', [WebpageController::class, 'updateVisitUs'])->name('website-pages.home.visit_us.update');
    Route::post('/website-pages/home/franchise-cta', [WebpageController::class, 'updateFranchiseCta'])->name('website-pages.home.franchise_cta.update');

    Route::get('/website-pages/story', [WebpageController::class, 'story'])->name('website-pages.story');
    Route::post('/website-pages/story', [WebpageController::class, 'updateStory'])->name('website-pages.story.update');

    Route::get('/website-pages/franchise', [WebpageController::class, 'franchise'])->name('website-pages.franchise');
    Route::post('/website-pages/franchise', [WebpageController::class, 'updateFranchise'])->name('website-pages.franchise.update');

    Route::get('/website-pages/contact', [WebpageController::class, 'contact'])->name('website-pages.contact');
    Route::post('/website-pages/contact', [WebpageController::class, 'updateContact'])->name('website-pages.contact.update');

    Route::get('/menu', function () {
        return view('admin.menu.index');
    })->name('menu.index');

    Route::get('/customers', function () {
        return view('admin.customers.index');
    })->name('customers.index');

    Route::get('/staff', function () {
        return view('admin.staff.index');
    })->name('staff.index');

    Route::get('/reports', function () {
        return view('admin.reports.index');
    })->name('reports.index');

    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
