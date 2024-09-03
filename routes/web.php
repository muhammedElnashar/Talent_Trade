<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('jobPosts', JobPostController::class);
Route::resource('comments', CommentController::class);