<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Page>
 */
class PageFactory extends Factory
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
            'slug' => fake()->unique()->slug(),
            'content' => '<p>'.fake()->paragraphs(3, true).'</p>',
            'excerpt' => fake()->sentence(10),
            'meta_title' => $title.' | سين ياء',
            'meta_description' => fake()->sentence(15),
            'meta_keywords' => 'سين ياء, تنظيف, خدمات',
            'status' => true,
            'show_in_header' => false,
            'show_in_footer' => true,
            'order' => fake()->numberBetween(1, 10),
            'views' => fake()->numberBetween(0, 100),
        ];
    }
}
