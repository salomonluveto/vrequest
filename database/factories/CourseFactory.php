<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_vehicule'=>Vehicule::factory(),
            'id_chauffeur'=>Chauffeur::factory(),
            'id_demande'=>Demande::factory(),
            'status'=>$this->faker->rondomElement(['en_attente', 'en_cours', 'terminé']),
            'commentaire'=>$this->faker->sentence,
        ];
    }
}
