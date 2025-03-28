<?php

namespace Database\Factories;

use App\Models\HotelProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelProfile>
 */
class HotelProfileFactory extends Factory
{
    protected $model = HotelProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_name' => $this->faker->company.' Hotel',
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'province' => $this->faker->state,
            'country' => 'Costa Rica',
            'latitude' => $this->faker->latitude(8, 11),
            'longitude' => $this->faker->longitude(-85, -82),
            'active' => true,
        ];
    }
}
