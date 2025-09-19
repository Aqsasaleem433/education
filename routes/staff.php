<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StaffController;

use Dom\Comment;
use Illuminate\Support\Facades\Route;
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'staff', 'as' => 'staff.'],
    function () {
    Route::resource('attendance', AttendanceController::class);
    Route::resource('exams', ExamController::class);
});


