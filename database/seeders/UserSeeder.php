<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => Hash::make('password123')]
        );

        for ($i = 1; $i <= 10; $i++) {
            User::firstOrCreate(
                ['email' => "user$i@example.com"],
                ['name' => "User $i", 'password' => Hash::make('password123')]
            );
        }
    }
}
