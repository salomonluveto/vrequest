<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Demande>
 */
class DemandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /*'name'=> $this->faker->name(1, $gender='male', true),
            'motifs'=> $this->faker->sentence,
            'destination'=> $this->faker->paragraph(2),
            'nombrePersonne'=> $this->faker->randomDigit,*/
        ];
    }
}
