<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

}


