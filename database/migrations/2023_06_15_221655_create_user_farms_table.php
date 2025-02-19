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
        Schema::create('user_farms', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['owner', 'handler'])->default('owner');
            $table->foreignId('users_id')->onDelete('cascade');
            $table->foreignId('farm_houses_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_farms');
    }
};
