<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('role')->default('User');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert([[
                'f_name' => 'John',
                'l_name' => 'Doe',
                'role' => 'Admin',
                'email' => 'admin@nixxy.com',
                'password' => bcrypt('Jebemboha'),
            ],
            [
                'f_name' => 'Jane',
                'l_name' => 'Doe',
                'role' => 'User',
                'email' => 'user@nixxy.com',
                'password' => bcrypt('Jebembohynu'),
            ],
            [
                'f_name' => 'Patrik',
                'l_name' => 'Nemčok',
                'role' => 'Teacher',
                'email' => 'patkonemcok@gmail.com',
                'password' => bcrypt('picus123'),
            ],
            [
                'f_name' => 'Fabián',
                'l_name' => 'Vojár',
                'role' => 'Student',
                'email' => 'fabvoj@gmail.com',
                'password' => bcrypt('kokot123'),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
