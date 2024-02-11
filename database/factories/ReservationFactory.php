<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Excursion;
use App\Models\Destination;
use App\Models\ReservationStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::inRandomOrder()->value('id');
        $excursion_id = Excursion::inRandomOrder()->value('id');
        $excursion_destination = Excursion::find($excursion_id)->destination;
        $hotel_id = Hotel::where('destination', $excursion_destination)->inRandomOrder()->value('id');
        
        $excursion_start_date = Excursion::find($excursion_id)->start_date;
        $free_cancelation_date = Carbon::parse($excursion_start_date)->subDays(14);
        $status = ReservationStatus::where('status_type', 'booked')->first();
        $statusId = $status ? $status->id : null;
        
        
        return [
            'user_id' => $user_id,
            'excursion_id' => $excursion_id,
            'hotel_id' => $hotel_id,
            'free_cancelation_date' => $free_cancelation_date,
            'status' => $statusId
        ];
    }
}