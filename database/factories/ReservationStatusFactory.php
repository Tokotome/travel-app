<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationStatusFactory extends Factory
{
    protected $model = \App\Models\ReservationStatus::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status_type' => $this->faker->unique()->randomElement(['booked', 'canceled']),
        ];
    }
}
