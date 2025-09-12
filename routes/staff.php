<?php

namespace App\Http\Controllers\Admin;

use Dom\Comment;
use Illuminate\Support\Facades\Route;


// Staff (Teachers)
Route::middleware(['role:Staff'])->group(function () {
    Route::resource('attendance', AttendanceController::class);
    Route::resource('exams', ExamController::class);
});


