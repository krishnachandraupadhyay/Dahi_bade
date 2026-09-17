<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
