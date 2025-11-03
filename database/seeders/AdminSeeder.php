<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin' . time() . '@example.org', // Dummy email address
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
