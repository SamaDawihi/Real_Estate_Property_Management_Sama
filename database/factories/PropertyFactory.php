<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //id, title, address, price, bedrooms, bathrooms, type (like apartment, villa, etc.), and status (like available, sold, etc.)

        //setting random elements based on type: villa or apartment
        $type = $this->faker->randomElement(['A', 'V']);
        $price = $type == 'A'? $this->faker->numberBetween(10000, 100000) : $this->faker->numberBetween(100000, 10000000);
        $bedrooms = $type == 'A'? $this->faker->numberBetween(1, 5) : $this->faker->numberBetween(3, 10);
        $bathrooms = $this->faker->numberBetween($bedrooms, $bedrooms + 3);
        
        return [
            'title' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'price' => $price,
            'bedrooms' => $bedrooms,
            'bathrooms' => $bathrooms,
            'type' => $type,
            'status' => $this->faker->randomElement(['A', 'S'])
        ];;
    }
}
