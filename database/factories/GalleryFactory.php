<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'category' => fake()->randomElement(['تنظيف الفلل', 'غسيل الكنب', 'جلي الرخام', 'غسيل السجاد', 'تعقيم الخزانات']),
            'category_icon' => 'fa-solid fa-sparkles',
            'location' => 'حي '.fake()->city().' - الرياض',
            'image' => 'assets/frontend/images/villa.jpg',
            'description' => fake()->paragraph(),
            'status' => true,
            'order' => fake()->numberBetween(1, 10),
        ];
    }
}
