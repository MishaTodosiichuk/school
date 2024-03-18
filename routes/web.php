<?php

use App\Http\Controllers\Pages\Menu\StatusController;
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

Route::get('/', 'App\Http\Controllers\Pages\HomeController')->name('pages.home');

Route::get('/photogallery', 'App\Http\Controllers\Pages\PhotogalleryController')->name('pages.photogallery');

Route::get('/contacts', 'App\Http\Controllers\Pages\ContactsController')->name('pages.contacts');

Route::get('/news', 'App\Http\Controllers\Pages\NewsController')->name('pages.news');

Route::resource('/status', StatusController::class);

Route::get('/licenziya-na-provadzhennya-osvitnoi-diyalnosti', 'App\Http\Controllers\Pages\Menu\LicenziyaNaProvadzhennyaOsvitnoiDiyalnostiController')->name('pages.menu.licenziya_na_prov');

Route::get('/ustanovchi-dokumenti', 'App\Http\Controllers\Pages\Menu\UstanovchiDokumentiController')->name('pages.menu.ustanovchi_dock');

Route::get('/normativni-dokumenti', 'App\Http\Controllers\Pages\Menu\NormativniDokumentiController')->name('pages.menu.normativni-dock');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin
Route::resource('/roles', RoleController::class)->middleware('can: show role');

require __DIR__ . '/auth.php';
