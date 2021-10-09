<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);

    Route::match(['get', 'post'], '/create', [CategoryController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [CategoryController::class, 'form']);

    Route::get('/delete/{id}', [CategoryController::class, 'delete']);
});

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);

    Route::match(['get', 'post'], '/create', [PostController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [PostController::class, 'form']);

    Route::get('/delete/{id}', [PostController::class, 'delete']);
});

Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index']);

    Route::match(['get', 'post'], '/create', [TagController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [TagController::class, 'form']);

    Route::get('/delete/{id}', [TagController::class, 'delete']);
});

