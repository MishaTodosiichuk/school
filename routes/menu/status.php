<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Pages\Menu\Status'], function ()  {
    Route::get('/status', 'IndexController')->name('status.index');

    Route::get('/status/{status}', 'ShowController')->name('status.show');

    Route::middleware(['auth'])->group(function ()  {
        Route::get('status/create', 'CreateController')->name('status.create');

        Route::post('/status', 'StoreController')->name('status.store');

        Route::get('/status/{status}/edit', 'EditController')->name('status.edit');

        Route::patch('/status/{status}', 'UpdateController')->name('status.update');

        Route::delete('/status/{status}', 'DestroyController')->name('status.destroy');
    });
});
?>
