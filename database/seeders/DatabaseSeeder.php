<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::factory()->create([
                'name' => 'System Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // This securely encrypts the password
            ]);
        }
    }
}