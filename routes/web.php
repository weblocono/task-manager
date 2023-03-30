<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostManagerController;
use Illuminate\Support\Facades\Route;

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


Route::controller(AuthController::class)->prefix('/auth')->as('auth')->group(function () {
    Route::post('/login', 'login')->name('login_action');
    Route::post('/registarion', 'registarion')->name('registarion_action');

    Route::controller(IndexController::class)->group(function() {
        Route::get('/login', 'login')->name('login');
        Route::get('/registarion', 'registarion')->name('registarion');
    });

});

Route::middleware('auth')->group(function () {
    Route::controller(IndexController::class)->group(function() {
        Route::get('/post', 'posts')->name('posts');
        Route::get('/post/{post}', 'post')->name('post');
    
        
    });

    Route::controller(PostManagerController::class)->prefix('/posts')->as('posts')->group(function() {
        Route::post('/', 'store')->name('create');
        Route::post('/{post}/delete', 'delete')->name('delete');
    });

    Route::controller(CommentController::class)->prefix('/comment/{post}')->as('comment')->group(function() {
        Route::post('/', 'store')->name('create');
        Route::post('/delete', 'delete')->name('delete');
    });
});