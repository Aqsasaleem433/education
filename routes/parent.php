<?php

namespace App\Http\Controllers\Admin;

use Dom\Comment;
use Illuminate\Support\Facades\Route;



// Parents
Route::middleware(['role:Parent'])->group(function () {
    Route::get('/child-results', [ResultController::class, 'parentView']);
});
