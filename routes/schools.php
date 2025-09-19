<?php

namespace App\Http\Controllers\School;
use App\Http\Controllers\SchoolController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\Auth\LoginController;

// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login'])->name('login.submit');
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');



// School Admin
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'school', 'as' => 'school'],
    function () {
     Route::get('/', [SchoolController::class, 'index'])->name('dash');
    Route::resource('staff', StaffController::class);
    Route::resource('students', StudentController::class);
    Route::resource('parents', ParentController::class);
}); 
