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
        Schema::create('excursion_comments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users')->restrictOnDelete();
            $table->integer('excursion_id')->references('id')->on('excursions')->restrictOnDelete();
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('excursion_comments');
    }
};
