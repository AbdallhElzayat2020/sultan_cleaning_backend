<?php

namespace Database\Factories;

use App\Models\WhyChooseUs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<WhyChooseUs>
 */
class WhyChooseUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => 'fa-solid fa-star',
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(2),
            'status' => true,
            'order' => fake()->numberBetween(1, 10),
        ];
    }
}
