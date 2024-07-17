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
        for ($i = 1; $i <= 10; $i++) {
            User::firstOrCreate(
                ['email' => "user$i@example.com"],
                [
                    'nama' => "User $i", 
                    'password' => Hash::make('password123'),
                    'role' => 'customer'  // Menambahkan default value untuk role
                ]
            );
        }

        for ($i = 1; $i <= 5; $i++) {
            User::firstOrCreate(
                ['email' => "staff$i@example.com"],
                [
                    'nama' => "staff $i", 
                    'password' => Hash::make('password123'),
                    'role' => 'staff'  // Menambahkan default value untuk role
                ]
            );
        }
    }
}
