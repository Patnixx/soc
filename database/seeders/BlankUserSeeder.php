<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlankUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i =0; $i < 10; $i++)
        {
            User::create([
                'f_name' => 'Meno '.$i.'',
                'l_name' => 'Priezvisko '.$i.'',
                'email' => 'meno'.$i.'@priezvisko.sk',
                'role' => 'User',
                'birthday' => '2025-01-08',
                'tel_number' => '0000-000-000',
                'password' => 'Abcdef0*',
                'created_at' => now(),
                'updated_at' => now(),
                ]
            );
        }
    }
}
