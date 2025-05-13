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
	static $titles = [
		'Encuesta 1',
		'Encuesta 2',
		'Encuesta 3',
		'Encuesta 4'
	];

		static $index = 0;
        return [
            'title' => $titles[$index++ % count($titles)],
            'description' => 'Descripcion estatica para encuesta ' . $titles[$index % count($titles)],
            'isActive' => true,
        ];
    }
}
