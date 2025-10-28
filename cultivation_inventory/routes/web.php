<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StudentController;

Route::get('/', [ItemController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class);
Route::resource('items', ItemController::class);
