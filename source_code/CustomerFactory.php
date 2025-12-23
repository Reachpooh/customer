<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $family = ['sok', 'sao', 'atith', 'chan', 'angkear', 'puth', 'prohos'];
        $given = ['maraka', 'kumpheak', 'minea', 'mesa', 'osaphea', 'mitona', 'kakada', 'seha', 'kanha', 'tola', 'vicheka', 'thnou'];
        $randomFamily = $this->faker->randomElement($family);
        $randomGiven = $this->faker->randomElement($given);
        $full_name = "$randomFamily $randomGiven";

        return [
            'name' => $full_name,
            'tel' => $this->faker->phoneNumber(),
        ];
    }
}
