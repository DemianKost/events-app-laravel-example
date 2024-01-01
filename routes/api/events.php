<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Ingress\EventStoreController;
use Illuminate\Support\Facades\Route;

Route::post('/', EventStoreController::class)->name('store');