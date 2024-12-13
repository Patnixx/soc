<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 4; $i++) {
            Form::create([
                'user_id' => 4,
                'f_name' => 'Josh',
                'l_name' => 'Doe',
                'email' => 'blank@nixxy.com',
                'birthday' => '23.01.06',
                'season' => 'Winter',
                'length' => 'Turbo',
                'class' => 'A',
                'reason' => 'I want to learn',
                'approval' => 'Waiting',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
