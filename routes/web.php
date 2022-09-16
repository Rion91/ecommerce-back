<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AuthController::class, 'showLoginForm']);
Route::post('admin/login', [AuthController::class, 'postLoginForm'])->name('login');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminAuth'], function () {
    Route::get('/', [AdminController::class, 'home'])->name('home');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
