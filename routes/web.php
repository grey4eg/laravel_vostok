<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// # Сайт
Route::prefix('/')->group(base_path('routes/main.php'));

// # Админпанель
Route::prefix('/admin')->middleware(['auth', 'user_is_admin'])->group(base_path('routes/admin.php'));
