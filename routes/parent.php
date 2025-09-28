<?php

namespace App\Http\Controllers\Parent;

use Dom\Comment;
use Illuminate\Support\Facades\Route;



// Parents
Route::group(
    ['middleware' => ['auth'], 'prefix' => 'parents', 'as' => 'parents'],
   function () {
        Route::resource('users', ParentController::class);
    });
