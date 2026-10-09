<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'city' => 'الرياض - '.fake()->randomElement(['حي النرجس', 'حي الياسمين', 'حي الملقا', 'حي العقيق', 'حي الصحافة', 'حي حطين']),
            'rating' => fake()->numberBetween(4, 5),
            'review' => fake()->realText(120),
            'avatar' => null,
            'status' => true,
            'order' => fake()->numberBetween(1, 10),
        ];
    }
}
