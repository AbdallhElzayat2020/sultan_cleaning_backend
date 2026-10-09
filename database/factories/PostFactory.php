<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(100, 999),
            'category' => fake()->randomElement(['نصائح الخبراء', 'دليل المنازل', 'صحة وسلامة', 'إرشادات النظافة']),
            'category_icon' => fake()->randomElement(['fa-solid fa-lightbulb', 'fa-solid fa-hammer', 'fa-solid fa-droplet', 'fa-solid fa-broom']),
            'image' => null,
            'short_description' => fake()->paragraph(2),
            'content' => '<p>'.implode('</p><p>', fake()->paragraphs(4)).'</p>',
            'reading_time' => fake()->randomElement(['3 دقائق قراءة', '5 دقائق قراءة', '7 دقائق قراءة']),
            'views' => fake()->numberBetween(50, 1500),
            'status' => true,
            'order' => fake()->numberBetween(1, 10),
            'published_at' => now(),
        ];
    }
}
