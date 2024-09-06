<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CandidateTechnologyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechnologyController;

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


Route::resource('users', UserController::class);
Route::resource('category', CategoryController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('skills',TechnologyController::class);



Route::get('/dashboard-role', function () {return view('auth/dashboard-role');})->name('dashboard_role');
Route::resource('employee', EmployeeController::class);
Route::resource('candidate', CandidateController::class);
Route::resource('candidate-technology', CandidateTechnologyController::class);
Route::get('/employeeDashboard', function () {return view('dashboard.employee');})->name("employeeDashboard");
Route::get('/candidateDashboard', function () {return view('dashboard.candidate');})->name("candidateDashboard");