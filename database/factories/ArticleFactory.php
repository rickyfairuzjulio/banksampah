<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'content' => $this->faker->paragraphs(5, true),
            'category' => $this->faker->randomElement(['Edukasi','Teknis','Tips']),
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->randomNumber(5),
        ];
    }
}
