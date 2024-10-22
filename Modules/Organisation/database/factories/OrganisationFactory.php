<?php

namespace Duobix\Organisation\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganisationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Duobix\Organisation\Models\Organisation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'slug' => fake()->slug(),
            'status' => fake()->boolean(),
            'website' => fake()->url(),
        ];
    }
}
