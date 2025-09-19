<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;


Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {

        // Dashboard
        Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');
        // user

        Route::resource('users', UserController::class)->names('users');
        Route::resource('roles', RoleController::class)->names('roles');
    }
);

// Dashboards
//  Route::middleware(['role:School'])->get('/school/dashboard', fn() => view('home'))->name('school.dashboard');
// Route::middleware(['role:Staff'])->get('/staff/dashboard', fn() => view('dashboard.staff'))->name('staff.dashboard');
// Route::middleware(['role:Student'])->get('/student/dashboard', fn() => view('home'))->name('student.dashboard');
// Route::middleware(['role:Parent'])->get('/parent/dashboard', fn() => view('dashboard.parent'))->name('parent.dashboard');

