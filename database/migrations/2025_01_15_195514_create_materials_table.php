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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('syllab_id')->nullable();
            $table->unsignedBigInteger('elder_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->string('title');
            $table->text('content');
            $table->string('img_name')->nullable();
            $table->timestamps();

            $table->foreign('syllab_id')->references('id')->on('syllabs')->onDelete('cascade');
            $table->foreign('elder_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('materials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
