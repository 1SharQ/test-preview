<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\auth\logoutController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\postLikeController;
use App\Http\Controllers\userPostsController;
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

Route::get('/',function(){ return view('home');})->name('home');

Route::get('/register',[registerController::class, 'index'])->name('register');
Route::post('/register',[registerController::class, 'save']);


Route::get('/login',[loginController::class , 'index'])->name('login');
Route::post('/login',[loginController::class, 'save']);

Route::post('/logout',[logoutController::class, 'save'])->name('logout');


Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::post('/posts',[PostController::class, 'save']);
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/posts/{post:id}',[PostController::class, 'show'])->name('post.show');

Route::post('/posts/{post:id}/likes',[postLikeController::class, 'like'])->name('posts.likes');
Route::delete('/posts/{post:id}/likes',[postLikeController::class, 'destroy'])->name('posts.likes');

Route::get('/posts/{user:username}/posts',[userPostsController::class , 'getPosts'])->name('user.posts');