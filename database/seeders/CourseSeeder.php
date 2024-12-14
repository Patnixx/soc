<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 0; $i < 3; $i++){
            Course::create([
                'teacher_id' => 3,
                'name' => 'Letný kurz 2025',
                'description' => 'Poď sa s nami učiť šoférovať!',
                'class' => 'A',
                'length' => 'Turbo',
                'season' => 'Summer',
                'status' => 'Open',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
