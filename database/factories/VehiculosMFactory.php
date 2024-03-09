<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehiculosM>
 */
class VehiculosMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'placa' => $this->faker->unique()->randomElement(['AAA-AFZ', 'AGA-CYZ', 'A01-AAA', 'EUA-FPZ','VFA-VSZ','EA123SA','WE123PA', 'OP5123UA', 'TYU1 23OA','MX76-3TYU0','RTY456RT4','DFS 89S']),
            'anio' => $this->faker->numberBetween(1800,2024),
            'color' => $this->faker->colorName(),
            'fecha_ing' => $this->faker->date(),
            'marca' => $this->faker->numberBetween(1,8),
            'modelo' => $this->faker->numberBetween(1,8),
        ];
    }
}
