<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the existing columns
        Schema::table('excursions', function (Blueprint $table) {
            //$table->dropColumn('location_city');
            //$table->dropColumn('location_country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Reverse the changes in the 'up' method
        Schema::table('excursions', function (Blueprint $table) {
            $table->dropForeign(['destination']);
            $table->dropColumn('destination');
        });
    }
};
