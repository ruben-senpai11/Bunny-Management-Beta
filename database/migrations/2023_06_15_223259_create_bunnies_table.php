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
            $table->string('uid')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->enum('destination', ['fattening', 'mating']);
            $table->enum('age', ['baby_bunny','growing','weaning','young_adult_bunny','adult','old']);
            $table->enum('state', ['healthy', 'sick_bunny','dead','sold']);
            $table->string('weight')->nullable();
            $table->string('color')->nullable();

            $table->date('date_birth')->nullable();
            $table->unsignedBigInteger('farm_houses_id')->nullable();
            $table->unsignedBigInteger('race_id')->nullable();
            $table->unsignedBigInteger('fm_id')->nullable();
            $table->foreign('farm_houses_id')->references('id')->on('farm_houses');
            $table->foreign('race_id')->references('id')->on('races');
            $table->foreign('fm_id')->references('id')->on('female_states');
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
