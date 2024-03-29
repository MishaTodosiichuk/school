<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\News', 'prefix' => 'news'], function ()  {
    Route::get('/', 'IndexController')->name('news.index');

    Route::get('/{news}', 'ShowController')->name('news.show');

    Route::middleware(['auth'])->group(function ()  {
        Route::get('/create', 'CreateController')->name('news.create');

        Route::post('/', 'StoreController')->name('news.store');

        Route::get('/{news}/edit', 'EditController')->name('news.edit');

        Route::put('/{news}', 'UpdateController')->name('news.update');

        Route::delete('/{news}', 'DestroyController')->name('news.destroy');
    });
});
