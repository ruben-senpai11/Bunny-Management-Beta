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
        Schema::create('bunnies', function (Blueprint $table) {
            $table->id();
            $table->string('Uid')->nullable();
            $table->enum('sex', ['male', 'female']);
            $table->enum('destination', ['fattening', 'mating']);
            $table->string('weight')->nullable();
            $table->date('date_birth')->nullable();
            $table->unsignedBigInteger('farm_houses_id')->nullable();
            $table->unsignedBigInteger('race_id')->nullable();
            $table->foreign('farm_houses_id')->references('id')->on('farm_houses');
            $table->foreign('race_id')->references('id')->on('races');
            $table->foreignId('gestation_id')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bunnies');
    }
};
