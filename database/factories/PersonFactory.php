<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @noinspection PhpUndefinedMethodInspection
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => $this->faker->cpf(false),
            'phone' => $this->faker->cellphoneNumber(false, true),
            'birth_date' => $this->faker->date('Y-m-d', '-100 years'),
            'address_id' => Address::factory(),
        ];
    }
}
