<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StudentController;

use Dom\Comment;
use Illuminate\Support\Facades\Route;



Route::group(
    ['middleware' => ['auth'], 'prefix' => 'school', 'as' => 'school'],
 function () {
        Route::resource('users', StudentController::class);
    });


