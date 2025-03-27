<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DriverProfile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DriverProfile>
 */
class DriverProfileFactory extends Factory
{
    protected $model = DriverProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_number' => $this->faker->randomElement([
                $this->faker->numerify('#-####-####'),
                $this->faker->numerify('############'),
            ]),
            'license_plate_number' => strtoupper($this->faker->bothify('???-###')),
            'license_photo_front' => $this->faker->imageUrl(640, 480, 'transport', true),
            'license_photo_back' => $this->faker->imageUrl(640, 480, 'transport', true),
            'date_of_birth' => $this->faker->date('Y-m-d', '-18 years'),
        ];
    }
}
