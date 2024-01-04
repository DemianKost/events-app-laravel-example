<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', fn (Request $request) => $request->user());

Route::prefix('v1')->as('v1:')->group( static function(): void {
    Route::prefix('ingress/events')->as('ingress:events')->group( function() {
        base_path('routes/api/events.php');
    });
});