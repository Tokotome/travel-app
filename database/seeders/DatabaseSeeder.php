<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Destination::factory(30)->create();
        \App\Models\Hotel::factory(300)->create();
        \App\Models\Excursion::factory(300)->create();
        \App\Models\ReservationStatus::factory(2)->create();
        \App\Models\ReservationStatus::factory(2)->create();
    }
}
