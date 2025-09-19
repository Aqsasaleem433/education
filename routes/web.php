<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Auth\LoginController;

// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login.submit');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');







Route::get('/', function () {
    return redirect()->route('login');
    //     return redirect()->route('register');

});

Route::get('/', function () {
    // return 'welcome';
    return view('home');
})->name('home');
Route::get('/menu', function () {
    Artisan::call('db:seed', ['--class' => 'PermissionTableSeeder']);
    return 'Menu';
})->name('menu');

// Route::middleware(['role:Admin'])->get('/admin/dashboard', fn() => view('home'))->name('admin.dashboard');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
include('admin.php');
include('staff.php');
include('parent.php');
include('student.php');
include('schools.php');
