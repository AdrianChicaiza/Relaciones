<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nombre'=> $this->faker->name,
            'biografia'=> $this->faker->sentence,
            'github'=> $this->faker->userName,
            'website'=> $this->faker->url,
        ];
    }
}
