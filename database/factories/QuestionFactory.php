<?php

namespace Database\Factories;

use App\Models\question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = question::class;

    public function definition()
    {
        return [
            'question' => $this->faker->sentence,
            'category' => $this->faker->word, // Simulación de categorías
            'answers' => $this->faker->randomElements([
                'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4'
            ], 3), // Tres respuestas aleatorias
            'subsurvey_id' => \App\Models\subsurveys::factory(), // Asociar con una encuesta
        ];
    }
}
