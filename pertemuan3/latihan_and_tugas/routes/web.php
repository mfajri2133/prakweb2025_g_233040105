<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blog', [HomeController::class, 'blog']);

Route::middleware('guest')->group(function () {
    Route::prefix('register')->name('register.')->controller(RegisterController::class)->group(function () {
        Route::get('/', 'showRegistrationForm')->name('index');
        Route::post('/', 'postRegistrationForm')->name('post');
    });

    Route::prefix('login')->name('login.')->controller(LoginController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('store');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->controller(DashboardPostController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{post:slug}', 'show')->name('show');
        Route::get('/{post:slug}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{post:slug}', 'destroy')->name('destroy');
    });

    Route::prefix('posts')->name('posts.')->controller(PostController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{post}', 'show')->name('show');
    });

    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::post('/', 'store')->name('store');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
