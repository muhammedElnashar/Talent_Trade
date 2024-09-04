<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
if (!Auth::check()){
    return to_route('login');
    }
    return view('dashboard')
    ;})->name("dashboard");
Route::get('/test', function () {return view('test');});
Auth::routes();
Route::get('/adminDashboard', function () { return view('dashboard.admin') ;})->name("adminDashboard");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('category', App\Http\Controllers\CategoryController::class);
Route::get('/dashboard-role', function () {return view('auth/dashboard-role');})->name('dashboard_role');
Route::resource('employee', EmployeeController::class);
Route::resource('candidate', CandidateController::class);
Route::get('/employeeDashboard', function () {return view('dashboard.employee');})->name("employeeDashboard");
Route::get('/candidateDashboard', function () {return view('dashboard.candidate');})->name("candidateDashboard");
