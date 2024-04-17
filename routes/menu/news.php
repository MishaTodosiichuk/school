<?php

use App\Http\Controllers\Pages\Menu\News\NewsController;
use App\Http\Controllers\Pages\Menu\News\NewsPhoto\NewsPhotoController;
use Illuminate\Support\Facades\Route;

Route::resource('/news', NewsController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::resource('/news_photo', NewsPhotoController::class)->middleware('auth');
