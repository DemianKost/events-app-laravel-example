<?php

declare(strict_types=1);

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth:sanctum', config('jetstream.auth_session')])->group(static function (): void {
    Route::get('/', function () {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    });

    Route::get('/dashboard', fn () => Inertia::render('Dashboard'))->name('dashboard');

    /**
     * Project routes
     */
    Route::prefix('projects')->as('projects:')->group(
        base_path('routes/web/projects.php')
    );
});
