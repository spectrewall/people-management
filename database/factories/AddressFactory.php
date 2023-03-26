<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @noinspection PhpUndefinedFieldInspection
     */
    public function definition(): array
    {
        return [
            'street' => $this->faker->streetName,
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
            'number' => $this->faker->buildingNumber,
        ];
    }
}
