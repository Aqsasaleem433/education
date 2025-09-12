<?php

namespace App\Http\Controllers\Admin;

use Dom\Comment;
use Illuminate\Support\Facades\Route;





// Students
Route::middleware(['role:Student'])->group(function () {
    Route::get('/take-exam/{id}', [ExamController::class, 'takeExam']);
});


