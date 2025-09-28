<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {

        // Define permissions
        $permissions = [
            'manage-schools',
            'manage-teachers',
            'manage-students',
            'manage-parents',
            'manage-classrooms',
            'manage-subjects',
            'manage-attendance',
            'manage-exams',
            'manage-results',
            'manage-fees',
            'manage-notifications',
            'take-exams',
            'view-results',
            'book-tutoring-sessions',
            'teach-tutoring-sessions',
            'access-micro-learning',
            'manage-staff',
            'view-dashboard',
            'manage-settings',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // // Create permissions if not exist
        // foreach ($permissions as $permission) {
        //     Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        // }

        // Define roles
        $roles = [
            'Admin' => ['manage schools', 'manage staff', 'manage students', 'manage parents', 'view dashboard', 'manage settings'],
            'SchoolAdmin' => ['manage staff', 'manage students', 'manage parents', 'view dashboard'],
            'Staff' => ['manage students', 'view dashboard'],
            'Student' => ['view dashboard'],
            'Parent' => ['view dashboard'],
        ];

        // // Create roles and assign permissions
        // foreach ($roles as $roleName => $rolePermissions) {
        //     $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        //     $role->syncPermissions($rolePermissions);
        // }
    }
}
// php artisan db:seed --class=PermissionTableSeeder