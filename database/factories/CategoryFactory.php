<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker=fake();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        return [
            'name'=>fake()->jobTitle(). ' '. fake()->vegetableName()
        ];
    }
}
