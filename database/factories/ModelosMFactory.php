<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelosM>
 */
class ModelosMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => $this->faker->unique()->randomElement(['R8', 'Continental', 'Tourer', 'Chiron','Fiesta','Focus','Civic', 'Nexo', 'Centenario','MX-30','Eclipse Cross','Pulsar'])
        ];
    }
}
