<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for($i =0; $i < 8;$i++){
            Car::create([
                'brand' => 'Škoda',
                'model' => 'Octavia',
                'year' => random_int(1996, 2025),
                'horsepower' => '99',
                'cubage' => '1.9',
                'gearbox' => 'manual',
                'drive' => 'FWD',
                'mileage' => random_int(0, 1000000),
            ]);
        }
    }
}
