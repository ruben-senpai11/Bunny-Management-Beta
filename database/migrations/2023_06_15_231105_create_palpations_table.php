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
        Schema::create('palpations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_houses_id')->nullable();
            $table->foreign('farm_houses_id')->references('id')->on('farm_houses');
            $table->unsignedBigInteger('mating_id')->nullable();
            $table->foreign('mating_id')->references('id')->on('matings');
            $table->date('palpation_date');
            $table->enum('palpation_result', ['success', 'fail']);
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palpations');
    }
};
