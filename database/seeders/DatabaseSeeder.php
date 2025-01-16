<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        /*NORMAL*/ $this->call([UserSeeder::class, FormSeeder::class, CourseSeeder::class, CarSeeder::class]/*, [OccasionSeeder::class], [SyllabSeeder::class]*/);
        /*NORMAL*/ //$this->call([UserSeeder::class], [CarSeeder::class]);
        /*BLANK*/ //$this->call([BlankUserSeeder::class]);   
    }
}
