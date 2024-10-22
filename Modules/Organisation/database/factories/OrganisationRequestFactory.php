<?php

namespace Duobix\Organisation\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganisationRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Duobix\Organisation\Models\OrganisationRequest::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
