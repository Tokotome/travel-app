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
        Schema::table('reservation_statuses', function (Blueprint $table) {
            $table->unique('status_type'); // Add a unique constraint to 'status_type'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation_statuses', function (Blueprint $table) {
            $table->dropUnique('reservation_statuses_status_type_unique'); // Drop the unique constraint
        });
    }
};
