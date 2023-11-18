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
        Schema::create('gestations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mating_id')->nullable();
            $table->foreign('mating_id')->references('id')->on('matings');
            $table->string('babies_number');
            $table->date('date_gestation');
            $table->text('observations')->nullable();
            $table->text('veterinary_follow_up')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestations');
    }
};
