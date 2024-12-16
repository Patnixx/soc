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
        User::create(
            [
                'f_name' => 'Jane',
                'l_name' => 'Doe',
                'role' => 'User',
                'birthday' => '2006-01-23',
                'tel_number' => '0123 456 789',
                'email' => 'user@nixxy.com',
                'password' => Hash::make('Jebembohynu'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'f_name' => 'Patrik',
                'l_name' => 'Nemčok',
                'role' => 'Teacher',
                'birthday' => '2006-01-23',
                'tel_number' => '0123 456 789',
                'email' => 'patkonemcok@gmail.com',
                'password' => Hash::make('picus123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'f_name' => 'Fabián',
                'l_name' => 'Vojár',
                'role' => 'Student',
                'birthday' => '2006-01-23',
                'tel_number' => '0123 456 789',
                'email' => 'fabvoj@gmail.com',
                'password' => Hash::make('kokot123'),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
