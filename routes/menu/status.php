<?php

use App\Http\Controllers\Pages\Menu\Status\StatusController;
use Illuminate\Support\Facades\Route;

Route::resource('/status', StatusController::class)->only(['create', 'store', 'edit', 'update', 'destroy'])->middleware('auth');

Route::get('/status', [StatusController::class, 'index'])->name('status.index');

Route::get('/status/{status}', [StatusController::class, 'show'])->name('status.show');
