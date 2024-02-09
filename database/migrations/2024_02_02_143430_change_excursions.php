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
        Schema::table('excursions', function(Blueprint $table) {
            $table->integer('location_city')->references('city')->on('destinations')->restrictOnDelete()->change();
            $table->integer('location_country')->references('country')->on('destinations')->restrictOnDelete()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
