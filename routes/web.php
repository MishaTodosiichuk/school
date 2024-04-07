<?php

use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\Menu\Photogallery\PhotogalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\Pages\HomeController')->name('pages.news.index');

Route::resource('/photogallery', PhotogalleryController::class);

Route::get('/send', 'App\Http\Controllers\Pages\MailController@send')->name('send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin
Route::resource('/roles', RoleController::class)->middleware('can: show role');

require __DIR__ . '/auth.php';
require __DIR__ . '/menu/news.php';
require __DIR__ . '/menu/status.php';
require __DIR__ . '/menu/contacts.php';
