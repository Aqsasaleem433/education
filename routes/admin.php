<?php

namespace App\Http\Controllers\Admin;

use Dom\Comment;
use Illuminate\Support\Facades\Route;


// Platform Admin
Route::middleware(['role:Admin'])->group(function () {
    Route::resource('schools', SchoolController::class);
});
