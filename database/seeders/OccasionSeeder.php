<?php

namespace Database\Seeders;

use App\Models\Occasion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i =1; $i < 3; $i++){
            Occasion::create([
                'name' => 'Teória '.$i.'',
                'start' => '2025-'.$i.'-27 14:00:00',
            ]);
        }
        for($i =1; $i < 3; $i++){
            Occasion::create([
                'name' => 'Ride '.$i.'',
                'start' => '2025-'.$i.'-28 11:00:00',
            ]);
        }
    }
}
