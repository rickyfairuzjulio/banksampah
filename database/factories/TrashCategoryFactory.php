<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TrashCategory>
 */
class TrashCategoryFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(),
            'price_per_kg' => $this->faker->numberBetween(500, 10000),
            'active' => true,
            'material_type' => 'anorganik',
        ];
    }
}
