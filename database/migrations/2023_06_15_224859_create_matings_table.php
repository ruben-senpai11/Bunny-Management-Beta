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
            $table->unsignedBigInteger('farm_houses_id')->nullable();
            $table->foreign('farm_houses_id')->references('id')->on('farm_houses');
            $table->unsignedBigInteger('male_id');
            $table->unsignedBigInteger('female_id');
            $table->date('mating_date');
            $table->foreign('male_id')->references('id')->on('bunnies')->onDelete('cascade');
            $table->foreign('female_id')->references('id')->on('bunnies')->onDelete('cascade');
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
