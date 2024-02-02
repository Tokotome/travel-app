<?php

namespace Database\Factories;

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
        $cityAndCountry = $this->faker->numberBetween(1, 60);
        
        return [
            'name' => $this->faker->name,
            'category' => $this->faker->numberBetween(3, 5),
            'city' => $cityAndCountry,
            'country' => $cityAndCountry,
            'has_pool' => $this->faker->boolean,
            'has_fitness' => $this->faker->boolean,
        ];
    }
}
