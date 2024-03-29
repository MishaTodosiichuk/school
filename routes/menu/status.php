<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Pages\Menu\Status', 'prefix' => 'status'], function ()  {
    Route::get('/', 'IndexController')->name('status.index');

    Route::get('/{status}', 'ShowController')->name('status.show');

    Route::middleware(['auth'])->group(function ()  {
        Route::get('/create', 'CreateController')->name('status.create');

        Route::post('/', 'StoreController')->name('status.store');

        Route::get('/{status}/edit', 'EditController')->name('status.edit');

        Route::put('/{status}', 'UpdateController')->name('status.update');

        Route::delete('/{status}', 'DestroyController')->name('status.destroy');
    });
});

