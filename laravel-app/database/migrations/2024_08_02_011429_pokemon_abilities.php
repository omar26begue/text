<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon_abilities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pokemon_id');
            $table->uuid('ability_id');

            $table->foreign('pokemon_id')->references('pokemon_id')->on('pokemon')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ability_id')->references('ability_id')->on('abilities')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_abilities');
    }
};
