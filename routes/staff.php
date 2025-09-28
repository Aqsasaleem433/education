<?php

namespace App\Http\Controllers;
use App\Http\Controllers\StaffController;

use Dom\Comment;
use Illuminate\Support\Facades\Route;



Route::group(
    ['middleware' => ['auth'], 'prefix' => 'school', 'as' => 'school'],
  function () {
        Route::resource('users', StaffController::class);
    });


