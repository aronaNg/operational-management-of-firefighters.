<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicule;
use App\Models\TypeVehicule;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'immatriculation' => $this->faker->sentence(),
            'disponible' => $this->faker->boolean,
            'date_achat' => $this->faker->dateTimeBetween('-3 month', 'now'),
            'id_type_vehicule' => $this->faker->numberBetween(1, 20),
        ];
    }
}
