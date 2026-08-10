<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\PosterController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pages/{slug}', [HomeController::class, 'page'])->name('page');
Route::post('/contact', [MessageController::class, 'store'])->name('messages.store');

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');

    Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');

    Route::post('/banners', [BannerController::class, 'store'])->name('banners.store');
    Route::patch('/banners/{banner}/toggle', [BannerController::class, 'toggle'])->name('banners.toggle');
    Route::delete('/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy');

    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    Route::patch('/messages/{message}/read', [AdminMessageController::class, 'markRead'])->name('messages.read');
    Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');

    Route::post('/posters', [PosterController::class, 'store'])->name('posters.store');
    Route::patch('/posters/{poster}/toggle', [PosterController::class, 'toggle'])->name('posters.toggle');
    Route::delete('/posters/{poster}', [PosterController::class, 'destroy'])->name('posters.destroy');
});
