<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Equipement;
use App\Models\TypeEquipement;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EquipementFactory extends Factory
{
    protected $model = Equipement::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->sentence(),
            'disponible' => $this->faker->boolean,
            'date_achat' => $this->faker->dateTimeBetween('-3 month', 'now'),
            'id_type_equipement' => $this->faker->numberBetween(1, 20),
        ];
    }
}
