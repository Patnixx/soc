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
        //
        User::create([
            'f_name' => 'John',
            'l_name' => 'Doe',
            'role' => 'Admin',
            'birthday' => '2006-01-23',
            'tel_number' => '0123 456 789',
            'email' => 'admin@nixxy.com',
            'password' => Hash::make('xYz12345#'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
            ]
        );
    }
}
