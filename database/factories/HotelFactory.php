<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $destinationIds = Destination::pluck('id');
        return [
            'destination' => $this->faker->randomElement($destinationIds),
            'name' => $this->faker->name,
            'category' => $this->faker->numberBetween(3, 5),
            'has_pool' => $this->faker->boolean,
            'has_fitness' => $this->faker->boolean,
        ];
    }
}
