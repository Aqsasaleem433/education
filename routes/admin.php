<?php
namespace App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // Dashboard
        // Route::get('home', fn() => view('home'))->name('home');

        // User & Role routes
        Route::resource('users', UserController::class)->names('users');
        Route::resource('roles', RoleController::class)->names('roles');
    }
);

// Dashboards by role
// Route::middleware(['role:School'])
//     ->get('/school/dashboard', fn() => view('home'))
//     ->name('school.dashboard');

// Route::middleware(['role:Staff'])
//     ->get('/staff/dashboard', fn() => view('dashboard.staff'))
//     ->name('staff.dashboard');

// Route::middleware(['role:Student'])
//     ->get('/student/dashboard', fn() => view('home'))
//     ->name('student.dashboard');

// Route::middleware(['role:Parent'])
//     ->get('/parent/dashboard', fn() => view('dashboard.parent'))
//     ->name('parent.dashboard');

