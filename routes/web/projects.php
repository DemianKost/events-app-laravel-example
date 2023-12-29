<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Projects\IndexController;
use App\Http\Controllers\Web\Projects\StoreController;

Route::get('/', IndexController::class)->name('index');
Route::post('/', StoreController::class)->name('store');
