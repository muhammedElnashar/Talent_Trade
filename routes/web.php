<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechnologyController;

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('skills',TechnologyController::class);
