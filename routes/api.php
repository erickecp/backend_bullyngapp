<?php

use App\Http\Controllers\questionController;
use App\Http\Controllers\surveyController;
use App\Http\Controllers\videoController;
use App\Http\Controllers\subsurveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Grupo de rutas para Surveys (Encuestas)
Route::prefix('surveys')->group(function () {
    Route::get('/', [surveyController::class, 'index']);        // Listar todas las encuestas
    Route::get('{survey}', [SurveyController::class, 'show']);  // Ver una encuesta específica
    Route::post('/', [SurveyController::class, 'store']);       // Crear una nueva encuesta
    Route::put('{survey}', [SurveyController::class, 'update']); // Actualizar una encuesta
    Route::delete('{survey}', [SurveyController::class, 'destroy']); // Eliminar una encuesta
});
Route::prefix('subsurveys')->group(function () {
    Route::get('/', [subsurveyController::class, 'index']);        // Listar todas las encuestas
    Route::get('{subsurvey}', [subsurveyController::class, 'show']);  // Ver una encuesta específica
    Route::post('/', [subsurveyController::class, 'store']);       // Crear una nueva encuesta
    Route::put('{subsurvey}', [subsurveyController::class, 'update']); // Actualizar una encuesta
    Route::delete('{subsurvey}', [subsurveyController::class, 'destroy']); // Eliminar una encuesta
});

// Grupo de rutas para Videos
Route::prefix('videos')->group(function () {
    Route::get('/', [videoController::class, 'index']);        // Listar todos los videos
    Route::get('{video}', [VideoController::class, 'show']);   // Ver un video específico
    Route::post('/', [VideoController::class, 'store']);       // Crear un nuevo video
    Route::put('{video}', [VideoController::class, 'update']); // Actualizar un video
    Route::delete('{video}', [VideoController::class, 'destroy']); // Eliminar un video
});

// Grupo de rutas para Questions (Preguntas)
Route::prefix('questions')->group(function () {
    Route::get('/', [questionController::class, 'index']);        // Listar todas las preguntas
    Route::get('{question}', [QuestionController::class, 'show']);  // Ver una pregunta específica
    Route::post('/', [QuestionController::class, 'store']);       // Crear una nueva pregunta
    Route::put('{question}', [QuestionController::class, 'update']); // Actualizar una pregunta
    Route::delete('{question}', [QuestionController::class, 'destroy']); // Eliminar una pregunta
});
