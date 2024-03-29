<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers\Pages\Menu\Contacts', 'prefix' => 'contacts'], function ()  {
    Route::get('/', 'IndexController')->name('contacts.index');

    Route::middleware(['auth'])->group(function ()  {
        Route::get('/{contact}/edit', 'EditController')->name('contacts.edit');

        Route::put('/{contact}', 'UpdateController')->name('contacts.update');
    });
});
