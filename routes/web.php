<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pages/{slug}', [HomeController::class, 'page'])->name('page');
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin/posters/update', [AdminController::class, 'updatePosters'])->name('admin.posters.update');

Route::post('/admin/upload', [AdminController::class, 'uploadImage'])->name('admin.upload');

// API routes for CRUD (called by JS)
Route::post('/admin/api/banners/save', [AdminController::class, 'saveBanner']);
Route::post('/admin/api/banners/delete', [AdminController::class, 'deleteBanner']);

Route::post('/admin/api/portfolios/save', [AdminController::class, 'savePortfolio']);
Route::post('/admin/api/portfolios/delete', [AdminController::class, 'deletePortfolio']);

Route::post('/admin/api/service-posters/save', [AdminController::class, 'saveServicePoster']);
Route::post('/admin/api/service-posters/delete', [AdminController::class, 'deleteServicePoster']);

Route::post('/api/contact', [AdminController::class, 'saveMessage']);
Route::post('/admin/api/messages/delete', [AdminController::class, 'deleteMessage']);
Route::post('/admin/api/messages/read', [AdminController::class, 'readMessage']);