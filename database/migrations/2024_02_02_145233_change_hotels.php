<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hotels', function(Blueprint $table) {
            $table->integer('category')->unsigned()->default(3)->change();
        });

        DB::statement('ALTER TABLE hotels ADD CONSTRAINT chk_category_range CHECK (category BETWEEN 3 AND 5)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
