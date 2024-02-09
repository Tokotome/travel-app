<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExcursionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d');
        $numberOfDays = $this->faker->randomElement([5, 7, 10]);
        $endDate = \Carbon\Carbon::parse($startDate)->addDays($numberOfDays)->format('Y-m-d');
        $totalOvernights = \Carbon\Carbon::parse($endDate)->diffInDays(\Carbon\Carbon::parse($startDate)) - 1;
        
        return [
            'start_date' => $startDate,
            'end_date' => $endDate,
            'start_city' => $this->faker->randomElement(['Sofia', 'Varna', 'Plovdiv']),
            'price' => $this->faker->randomFloat(2, 500, 5000),
            'total_overnights' => $totalOvernights,
            'destination' => $this->faker->numberBetween(1, 90),
        ];
    }
}
