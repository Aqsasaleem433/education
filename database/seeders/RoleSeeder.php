<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(['name' => 'Admin']);
        Role::firstOrCreate(['name' => 'SchoolAdmin']);
        Role::firstOrCreate(['name' => 'teacher']);
        Role::firstOrCreate(['name' => 'staff']);
        Role::firstOrCreate(['name' => 'student']);
        Role::firstOrCreate(['name' => 'parent']);
    }
}


