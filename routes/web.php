<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('jobPosts', JobPostController::class);
