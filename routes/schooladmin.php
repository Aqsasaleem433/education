<?php

namespace App\Http\Controllers\Admin;

use Dom\Comment;
use Illuminate\Support\Facades\Route;



// School Admin
Route::middleware(['role:School Admin'])->group(function () {
    Route::resource('staff', StaffController::class);
    Route::resource('students', StudentController::class);
    Route::resource('parents', ParentController::class);
});
