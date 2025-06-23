<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@hatayimar.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
            'role' => 'admin',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
        
        // Create editor user
        User::create([
            'name' => 'Editor',
            'email' => 'editor@hatayimar.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
            'role' => 'editor',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}
