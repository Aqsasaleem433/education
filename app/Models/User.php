<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password',
    ];
    // relationships
    public function school()
{
    return $this->belongsTo(School::class);
}

public function studentProfile()
{
    return $this->hasOne(StudentProfile::class);
}

public function teacherProfile()
{
    return $this->hasOne(TeacherProfile::class);
}

}

