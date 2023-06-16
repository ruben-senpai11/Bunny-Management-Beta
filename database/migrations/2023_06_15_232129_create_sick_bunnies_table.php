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
        Schema::create('sick_bunnies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bunny_id');
            $table->unsignedBigInteger('disease_id');
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->text('symptoms');
            $table->timestamps();

            $table->foreign('bunny_id')->references('id')->on('bunnies')->onDelete('cascade');
            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sick_bunnies');
    }
};
