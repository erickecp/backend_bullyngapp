<?php

namespace Database\Factories;

use App\Models\survey;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Survey>
 */
class SurveyFactory extends Factory
{ protected $model = Survey::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'isActive' => $this->faker->boolean(80), // 80% de que sea activo
        ];
    }
}
