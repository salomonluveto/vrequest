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
          'user_id'=>$this->faker->randomDigit,
          'site_id'=>$this->faker->randomDigit,
          'date'=>$this->faker->dateTime($max = 'now', $timezone =null),
          'motif'=> $this->faker->sentence(4),
          'date_deplacement'=> $this->faker->dateTime($max = 'now', $timezone = null),
          'lieu_depart'=>$this->faker->paragraph(1),
          'destination'=> $this->faker->paragraph(1),
          'nbre_passagers'=>$this->faker->randomDigit,
          'status'=>$this->faker->randomDigitNot(2,3,4,5,6,7,8,9),
          'longitude_depart'=>$this->faker->longitude($min = -180, $max = 180),
          'latitude_depart'=>$this->faker->latitude($min = -90, $max = 90),
          'longitude_destination'=>$this->faker->longitude($min = -180, $max = 180),
          'latitude_destination'=>$this->faker->latitude($min = -90, $max = 90)
        ];
    }
}
