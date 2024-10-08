<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subsurveys>
 */
class SubsurveysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => $this->faker->sentence,
            'survey_id' => \App\Models\subsurveys::factory(),
            //
        ];
    }
}
