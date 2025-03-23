<?php

namespace Database\Seeders;

use App\Models\question;
use App\Models\subsurvey;
use App\Models\survey;
use App\Models\video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 3 encuestas
        Survey::factory(4)->create()->each(function ($survey) {

            // Asociar 1 o 2 videos por encuesta
            Video::factory(rand(1, 2))->create(['survey_id' => $survey->id]);

            // Cargar preguntas predefinidas desde el archivo JSON
            $preguntas = json_decode(file_get_contents(database_path('data/preguntas.json')), true);

            // Filtrar preguntas para el survey_id actual
            $preguntasFiltradas = array_filter($preguntas, function ($pregunta) use ($survey) {
                return $pregunta['survey_id'] === $survey->id;
            });

            // Crear preguntas en la base de datos usando los datos del archivo JSON
            foreach ($preguntasFiltradas as $pregunta) {
                Question::create([
                    'question' => $pregunta['question'],
                    'question_2' => $pregunta['question_2'],
                    'category' => $pregunta['category'],
                    'url' => $pregunta['url'],
                    'answers' => $pregunta['answers'],
                    'survey_id' => $pregunta['survey_id'],
                ]);
            }
        });
    }
}
