<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'manage users',
            'manage roles',
            'manage permissions',
            'view dashboard',
            'manage pages',
            'create pages',
            'edit pages',
            'delete pages',
            'publish pages',
            'manage posts',
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts',
            'manage categories',
            'manage tags',
            'manage media',
            'manage menus',
            'manage settings',
            'manage seo',
            'view activity log',
            'manage comments',
            'moderate comments',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $admin->syncPermissions([
            'view dashboard',
            'manage users',
            'manage roles',
            'manage pages',
            'create pages',
            'edit pages',
            'delete pages',
            'publish pages',
            'manage posts',
            'create posts',
            'edit posts',
            'delete posts',
            'publish posts',
            'manage categories',
            'manage tags',
            'manage media',
            'manage menus',
            'manage settings',
            'manage seo',
            'view activity log',
            'manage comments',
            'moderate comments',
        ]);

        $editor = Role::firstOrCreate(['name' => 'Editor', 'guard_name' => 'web']);
        $editor->syncPermissions([
            'view dashboard',
            'manage pages',
            'create pages',
            'edit pages',
            'publish pages',
            'manage posts',
            'create posts',
            'edit posts',
            'publish posts',
            'manage categories',
            'manage tags',
            'manage media',
            'manage menus',
            'manage seo',
            'manage comments',
            'moderate comments',
        ]);

        $user = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);
        $user->syncPermissions([
            'view dashboard',
            'create posts',
            'edit posts',
        ]);
    }
}
