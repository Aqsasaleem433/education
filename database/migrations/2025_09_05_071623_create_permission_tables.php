<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'manage-schools',
            'manage-staff',
            'manage-students',
            'manage-parents',
            'manage-roles',
            'manage-permissions',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission, 'guard_name' => 'web']
            );
        }

        // Define roles
        $roles = [
            'Admin',
            'SchoolAdmin',
            'Staff',
            'Student',
            'Parent',
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(
                ['name' => $roleName, 'guard_name' => 'web']
            );

            if ($roleName === 'Admin') {
                // Admin gets all permissions
                $role->syncPermissions(Permission::all());
            }

            if ($roleName === 'SchoolAdmin') {
                $role->syncPermissions([
                    'manage-schools',
                    'manage-staff',
                    'manage-students',
                    'manage-parents',
                ]);
            }

            if ($roleName === 'Staff') {
                $role->syncPermissions([
                    'manage-students',
                    'manage-parents',
                ]);
            }

            if ($roleName === 'Student') {
                $role->syncPermissions([]);
            }

            if ($roleName === 'Parent') {
                $role->syncPermissions([]);
            }
        }
    }
}
