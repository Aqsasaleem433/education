<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StudentController;

use Dom\Comment;
use Illuminate\Support\Facades\Route;


Route::group(
    ['middleware' => ['auth'], 'prefix' => 'student', 'as' => 'student.'],
    function ()  {
    Route::get('/take-exam/{id}', [ExamController::class, 'takeExam']);
});


