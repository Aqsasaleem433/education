<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');







Route::get('/', function () {
    return redirect()->route('login');
    // if (Auth::check()) {
    //     $user = Auth::user();

    //     if ($user->hasRole('Admin')) {
    //         return redirect()->route('home');
    //     } elseif ($user->hasRole('SchoolAdmin')) {
    //         return redirect()->route('school.dash');
    //     } elseif ($user->hasRole('Staff')) {
    //         return redirect()->route('staff.dash');
    //     } elseif ($user->hasRole('Student')) {
    //         return redirect()->route('student.dash');
    //     } elseif ($user->hasRole('Parent')) {
    //         return redirect()->route('parent.dash');
    //     }
    // }

});

Route::get('/menu', function () {
    Artisan::call('db:seed', ['--class' => 'PermissionTableSeeder']);
    return 'Menu';
})->name('menu');

// Route::middleware(['role:Admin'])->get('/admin/dashboard', fn() => view('home'))->name('admin.dashboard');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('dash', [SchoolController::class, 'school'])->name('dash');
include('admin.php');
include('staff.php');
include('parent.php');
include('student.php');
include('school.php');
