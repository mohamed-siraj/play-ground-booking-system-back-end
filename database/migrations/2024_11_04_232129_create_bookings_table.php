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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->unsignedBigInteger('ground_id');
            $table->string('booking_date_from');
            $table->string('booking_date_to');
            $table->string('total_amount');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('ground_admin_id');
            $table->string('guest_name')->nullable();
            $table->string('guest_phone_number')->nullable();
            $table->string('notification_status');
            $table->string('status');
            $table->foreign('ground_id')->references('id')->on('grounds');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('ground_admin_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
