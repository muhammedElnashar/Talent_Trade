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
Route::prefix('admin')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/Dashboard', function () { return view('dashboard.admin') ;})->name("adminDashboard");
});
Route::prefix('employee')->middleware(['auth','is_employee'])->group(function () {
    Route::get('/Dashboard', function () {return view('dashboard.employee');})->name("employeeDashboard");

});

Route::prefix('candidate')->middleware(['auth',"is_candidate"])->group(function () {
    Route::get('/Dashboard', function () {return view('dashboard.candidate');})->name("candidateDashboard");
    });


Route::resource('candidate', CandidateController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard-role', function () {return view('auth/dashboard-role');})->name('dashboard_role');
Route::resource('employee', EmployeeController::class);
Route::resource('candidate', CandidateController::class);
