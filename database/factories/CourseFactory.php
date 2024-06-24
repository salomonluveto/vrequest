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
            'vehicule_id'=>Vehicule::factory(),
            'chauffeur_id'=>Chauffeur::factory(),
            'demande_id'=>Demande::factory(),
            'status'=>$this->faker->rondomElement(['en_attente', 'en_cours', 'terminé']),
            'commentaire'=>$this->faker->sentence,
        ];
    }
}
