<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sekolah/{slug}', [HomeController::class, 'show'])->name('sekolah.show');
Route::get('/news/{slug}/{type?}', [HomeController::class, 'news'])->name('news.show');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/berita', [HomeController::class, 'allnews'])->name('allnews');
Route::get('/laporan', [HomeController::class, 'eksis'])->name('eksis');