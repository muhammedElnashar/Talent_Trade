<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
Route::get('/dashboard-role', function () {return view('auth/dashboard-role');})->name('dashboard_role');
Route::resource('employee', EmployeeController::class);
Route::resource('candidate', CandidateController::class);
Route::get('/employeeDashboard', function () {return view('dashboard.employee');})->name("employeeDashboard");
Route::get('/candidateDashboard', function () {return view('dashboard.candidate');})->name("candidateDashboard");

//LOGIN_GITHUB

use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
//    return "redirect";
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $githubUser = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        "password" => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
        'image' => $githubUser->avatar,

    ]);
    Auth::login($githubUser);

    return redirect('/dashboard-role');

});
