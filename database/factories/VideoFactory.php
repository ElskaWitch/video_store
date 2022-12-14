<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(5),
            'url_img' => "https://source.unsplash.com/640x480/?person?/1",
            'nationality' => fake()->country(),
            'year_created' => fake()->year(),
            'actor' => fake()->name(),
            'created_at' => now(),
        ];
    }
}
