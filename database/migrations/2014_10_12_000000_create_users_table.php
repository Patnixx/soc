<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->date('birthday');
            $table->string('tel_number');
            
            //auth stuff
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('php_path')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert([[
                'f_name' => 'John',
                'l_name' => 'Doe',
                'role' => 'Admin',
                'birthday' => '2006-01-23',
                'tel_number' => '0123 456 789',
                'email' => 'admin@nixxy.com',
                'password' => Hash::make('Jebemboha'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
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
