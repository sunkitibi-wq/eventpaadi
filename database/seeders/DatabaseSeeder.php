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
        $this->call(ContentSeeder::class);

        $superAdmin = User::firstOrCreate([
            'email' => 'superadmin@eventpaadi.com',
        ], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('Super Admin');

        $admin = User::firstOrCreate([
            'email' => 'admin@eventpaadi.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('Admin');

        $editor = User::firstOrCreate([
            'email' => 'editor@eventpaadi.com',
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
