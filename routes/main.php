<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;

// ! Главная
Route::get('/', function () {
  return view('main.index');
})->name('main.index');

// ! Личный кабинет
Route::get('/dashboard', function () {
  return view('main.dashboard');
})->middleware(['auth'])->name('main.dashboard');
