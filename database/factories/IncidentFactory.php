<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Incident;
use App\Models\TypeIncident;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class IncidentFactory extends Factory
{
    protected $model = Incident::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ville' => $this->faker->city,
            'date_heure' => $this->faker->dateTimeBetween('-3 month', 'now'),
            'id_type_incident' => $this->faker->numberBetween(1, 20),
        ];
    }
}
