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
            'question_2' => $this->faker->sentence,
            'category' => $this->faker->randomElement(['multiple','opcion','video','escala']), // Simulación de categorías
            'url' => $this->faker->randomElement([null, 'https://www.youtube.com/watch?v=cNqfpyb83uY']), // Simulación de categorías
            'answers' => $this->faker->randomElements([
                'Answer 1', 'Answer 2', 'Answer 3', 'Answer 4', 'Answer 5', 'Answer 6', 'Answer 7', 'Answer 8'
            ], 3), // Tres respuestas aleatorias
            'survey_id' => \App\Models\survey::factory(), // Asociar con una encuesta
        ];
    }
}
