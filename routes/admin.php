<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PeopleController;

// ! Админпанель :: Главная
Route::get('/', IndexController::class)->name('admin.index');

// ! Peoples
Route::get('/peoples', [PeopleController::class, 'index'])->name('admin.people.index');
Route::get('/peoples/create', [PeopleController::class, 'create'])->name('admin.people.create');
Route::post('/peoples', [PeopleController::class, 'store'])->name('admin.people.store');
Route::get('/peoples/export/', [PeopleController::class, 'export'])->name('admin.people.export');
Route::get('/peoples/{id}/html', [PeopleController::class, 'show'])->name('admin.people.show')->where('id', '[0-9]{1,11}');
Route::get('/peoples/{id}', [PeopleController::class, 'getPdf'])->name('admin.people.getPdf')->where('id', '[0-9]{1,11}');
Route::post('/peoples/{id}', [PeopleController::class, 'loadPdf'])->name('admin.people.loadPdf')->where('id', '[0-9]{1,11}');
