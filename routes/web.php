<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboradController::class, 'index'])->name('dashboard.index');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/tweets', TweetController::class)->except('index', 'create', 'show')->middleware('auth');

Route::resource('/tweets', TweetController::class)->only('show');

Route::post('/tweets/{tweet}/store', [CommentController::class, 'store'])->name('tweets.comments.store')->middleware('auth');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')->middleware('auth');

Route::resource('/users', UserController::class)->only('update', 'edit', 'show')->middleware('auth');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile.index');

Route::post('/users/{user}/follow', [UserController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('/users/{user}/unfollow', [UserController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');


