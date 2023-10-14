<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nursery>
 */
class NurseryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'            => fake()->name(),
            'address_line_1'  => fake()->streetAddress(),
            'address_line_2'  => fake()->address(),
            'town'            => 'Newcastle',
            'county'          => 'Tyne & Wear',
            'postcode'        => 'abc',
            'telephone'       => '13',
            'organisation_id' => 1
        ];
    }
}
