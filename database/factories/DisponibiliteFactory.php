<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Disponibilite;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disponibilite>
 */
class DisponibiliteFactory extends Factory
{
    protected $model = Disponibilite::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'horaire_debut' => $this->faker->time('H:i'),
            'horaire_fin' => $this->faker->time('H:i'),
            'jour_semaine' => $this->faker->randomElement(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']),
        ];
    }
}
