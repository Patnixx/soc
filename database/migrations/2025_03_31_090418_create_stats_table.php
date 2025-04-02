<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('theory_count')->nullable()->default(0)->min(0)->max(10);
            $table->integer('virtual_practice_count')->nullable()->default(0)->min(0)->max(2);
            $table->integer('practice_count')->nullable()->default(0)->min(0)->max(18);
            $table->integer('kpp_count')->nullable()->default(0)->min(0)->max(1);
            $table->integer('exam_count')->nullable()->default(0)->min(0)->max(1);
            $table->integer('ended_courses_count')->nullable()->default(0)->min(0);
            $table->integer('ended_theory_count')->nullable()->default(0)->min(0);
            $table->integer('ended_virtual_practice_count')->nullable()->default(0)->min(0);
            $table->integer('ended_practice_count')->nullable()->default(0)->min(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stats');
    }
};
