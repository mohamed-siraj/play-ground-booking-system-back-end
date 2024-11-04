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
        Schema::create('grounds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('game_type_id');
            $table->unsignedBigInteger('location_id');
            $table->string('location_address');
            $table->string('level');
            $table->string('surrounding');
            $table->string('per_day_price');
            $table->string('available_day_from');
            $table->string('available_day_to');
            $table->string('description');
            $table->string('image_1');
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->unsignedBigInteger('ground_admin_id');
            $table->foreign('game_type_id')->references('id')->on('game_types');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('ground_admin_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grounds');
    }
};
