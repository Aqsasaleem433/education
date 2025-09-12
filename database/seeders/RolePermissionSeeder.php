<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder


{
    public function run()
    {
        // Define permissions
        $permissions = [
            'manage schools',
            'manage teachers',
            'manage students',
            'manage parents',
            'manage classrooms',
            'manage subjects',
            'manage attendance',
            'manage exams',
            'manage results',
            'manage fees',
            'manage notifications',
            'take exams',
            'view results',
            'book tutoring sessions',
            'teach tutoring sessions',
            'access micro learning',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $roles = [
            'Admin' => [
                'manage schools', 'manage teachers', 'manage students', 'manage parents',
                'manage classrooms', 'manage subjects', 'manage attendance',
                'manage exams', 'manage results', 'manage fees', 'manage notifications',
            ],
            'Teacher' => [
                'manage attendance', 'manage exams', 'manage results', 'teach tutoring sessions',
                'access micro learning',
            ],
            'Student' => [
                'take exams', 'view results', 'book tutoring sessions', 'access micro learning',
            ],
            'Parent' => [
                'view results', 'manage fees',
            ],
            'Tutor' => [
                'teach tutoring sessions',
            ],
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}

