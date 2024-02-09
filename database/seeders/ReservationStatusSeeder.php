<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert 'booked' status
        DB::table('reservation_statuses')->insert([
            'status_type' => 'booked',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Insert 'cancelled' status
        DB::table('reservation_statuses')->insert([
            'status_type' => 'cancelled',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
