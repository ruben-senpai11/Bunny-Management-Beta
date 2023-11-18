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
        Schema::create('bunny_races', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bunny_id');
            $table->unsignedBigInteger('race_id');
            $table->foreign('bunny_id')->references('id')->on('bunnies')->onDelete('cascade');
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bunny_races');
    }
};
