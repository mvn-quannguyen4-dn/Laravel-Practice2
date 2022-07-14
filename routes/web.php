<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', App\Http\Controllers\UserController::class)->middleware('auth');
Route::post('/users/search', [App\Http\Controllers\UserController::class, 'search'])->middleware('auth');
Route::get('/users/{user}/comments', [App\Http\Controllers\UserController::class, 'Comment'])->middleware('auth');
Route::get('/users/{user}/posts', [App\Http\Controllers\UserController::class, 'Post'])->middleware('auth');


Route::resource('comments', App\Http\Controllers\CommentController::class)->middleware('auth');
Route::get('/comments/{comment}/users', [App\Http\Controllers\CommentController::class, 'User'])->middleware('auth');
