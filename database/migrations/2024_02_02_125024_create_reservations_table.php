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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->string('excursion_id')->references('id')->on('excursions')->restrictOnDelete();
            $table->string('hotel_id')->references('id')->on('hotels')->restrictOnDelete();
            $table->string('free_cancelation_date');
            $table->integer('status')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
