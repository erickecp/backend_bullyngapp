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
        survey::factory(3)->create()->each(function ($survey) {

            // Asociar 1 o 2 videos por encuesta
            video::factory(rand(1, 2))->create(['survey_id' => $survey->id]);

            // Asociar entre 3 y 5 preguntas por encuesta
            question::factory(8)->create(['survey_id' => $survey->id]);
        });
    }
}
