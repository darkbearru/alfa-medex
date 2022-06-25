<?php

namespace Database\Factories;

use App\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Catalog>
 */
class CatalogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => $this->faker->numberBetween(0, 100),
            'token' => $this->faker->slug(2),
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3)
        ];
    }
}
