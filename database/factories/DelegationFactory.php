<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Delegation>
 */
class DelegationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>$this ->faker->numberBetween(1,9),
            'manager_id' =>$this ->faker->numberBetween(1,9),
            'date_debut' =>$this ->faker->date(),
            'date_fin' =>$this ->faker->date()
        ];
    }
}
