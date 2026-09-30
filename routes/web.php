<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DatasetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\RekomendasiController;

Route::get('/', [LandingController::class, 'landingpage'])->name('home');
Route::get('/about', [LandingController::class, 'About'])->name('about');
Route::get('/service', [LandingController::class, 'service'])->name('service');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/rekomendasi', [LandingController::class, 'rekomendasi'])->name('rekomendasi');
Route::post('/rekomendasi/proses', [RekomendasiController::class, 'prosesRekomendasi'])->name('rekomendasi.proses');



Route::get('/login', [
    AuthController::class,
    'showLogin'
])->name('login');

Route::post('/login', [
    AuthController::class,
    'login'
])->name('login.process');


// ========================
// ADMIN
// ========================

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('admin.dashboard');


    Route::get('/dataset', [
        DatasetController::class,
        'index'
    ])->name('admin.dataset.index');

    Route::get('/tampildataset', [
        DashboardController::class,
        'tampildataset'
    ])->name('admin.dataset.data');


    Route::post('/dataset/upload', [
        DatasetController::class,
        'upload'
    ])->name('admin.dataset.upload');


    Route::post('/logout', [
        AuthController::class,
        'logout'
    ])->name('logout');
});
