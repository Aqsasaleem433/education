<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\AuthController;

Route::get('/', function () {
    // return 'welcome';
    return view('home');
})->name('home');







Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
include('admin.php');
include('staff.php');
include('parent.php');
include('student.php');
include('schooladmin.php');
include('admin.php');