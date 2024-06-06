<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicule>
 */
class VehiculeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'capacite'=>$this->faker->numberBetween(4,50),
            'marque'=>fake()->name(),
            'plaque'=>$this->faker->bothify('??####??'),
        ];
    }
}
