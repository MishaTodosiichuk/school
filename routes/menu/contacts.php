<?php

use App\Http\Controllers\Pages\Menu\Contacts\ContactsController;
use Illuminate\Support\Facades\Route;

Route::resource('/contacts', ContactsController::class)->only(['edit', 'update'])->middleware('auth');

Route::get('/contacts', [ContactsController::class, 'index'])->name('contacts.index');


