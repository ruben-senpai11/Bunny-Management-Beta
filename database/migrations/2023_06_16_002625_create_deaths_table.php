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
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bunny_id');
            $table->foreign('bunny_id')->references('id')->on('bunnies');
            $table->string('cause_of_death');
            $table->dateTime('death_date');
            $table->text('symptoms')->nullable();
            $table->text('actions_taken')->nullable();
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deaths');
    }
};
