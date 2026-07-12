<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(PageSeeder::class);

        $superAdmin = User::firstOrCreate([
            'email' => 'superadmin@example.com',
        ], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin = User::firstOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Admin');

        $editor = User::firstOrCreate([
            'email' => 'editor@example.com',
        ], [
            'name' => 'Editor User',
            'password' => bcrypt('password'),
        ]);
        $editor->assignRole('Editor');

        $user = User::firstOrCreate([
            'email' => 'user@example.com',
        ], [
            'name' => 'Regular User',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('User');
    }
}
