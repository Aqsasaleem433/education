<?php

namespace App\Http\Controllers\School;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Auth\SchoolAuthController;
use App\Http\Controllers\School\UserController;
use App\Http\Controllers\School\RoleController;
use Dom\Comment;
use Illuminate\Support\Facades\Route;






// School Admin
Route::group(
    ['middleware' => ['auth','role:SchoolAdmin'], 'prefix' => 'school', 'as' => 'school.'],
  function () {
         Route::resource('roles', RoleController::class)->names('roles');
      Route::get('/school/dash', fn() => view('school.dash'))->name('school.dash');

      
});


