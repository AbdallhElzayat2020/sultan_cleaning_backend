<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(1, 9999),
            'icon' => 'fa-solid fa-broom',
            'image' => null,
            'short_description' => fake()->paragraph(1),
            'description' => fake()->paragraphs(3, true),
            'status' => true,
            'order' => fake()->numberBetween(1, 10),
        ];
    }
}
