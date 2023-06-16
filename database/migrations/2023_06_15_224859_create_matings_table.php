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
        Schema::create('matings', function (Blueprint $table) {
            $table->id();
            $table->date('date_mating');
            $table->unsignedBigInteger('bunny_male_id');
            $table->unsignedBigInteger('bunny_female_id');
            $table->foreign('bunny_male_id')->references('id')->on('bunnies')->onDelete('cascade');
            $table->foreign('bunny_female_id')->references('id')->on('bunnies')->onDelete('cascade');
            $table->string('remark')->nullable();
            $table->enum('status', ['confirmed', 'canceled'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matings');
    }
};
