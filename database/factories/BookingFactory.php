<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
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
            'phone' => '05'.fake()->numerify('########'),
            'service_id' => null,
            'service_name' => 'تنظيف منازل وفلل',
            'city' => 'الرياض - حي النرجس',
            'notes' => fake()->sentence(),
            'status' => 'pending',
        ];
    }
}
