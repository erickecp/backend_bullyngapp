<?php

use App\Http\Controllers\questionController;
use App\Http\Controllers\surveyController;
use App\Http\Controllers\videoController;
use App\Http\Controllers\subsurveyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyResponseController;
use App\Http\Controllers\SurveyUserController;
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
Route::prefix('responses')->group(function () {
    Route::get('/', [SurveyResponseController::class, 'getResposnses']);        // Listar todas las preguntas
    Route::get('getResponseByid/{id}', [SurveyResponseController::class, 'getResponseByid']);  // Ver una pregunta específica
    Route::post('/', [SurveyResponseController::class, 'newResponse']);       // Crear una nueva pregunta
    Route::put('responses', [SurveyResponseController::class, 'update']); // Actualizar una pregunta
    Route::delete('responses', [SurveyResponseController::class, 'destroy']); // Eliminar una pregunta
});
Route::prefix('userSurveys')->group(function () {
    Route::get('/', [SurveyUserController::class, 'getuserSurveys']);        // Listar todas las preguntas
    Route::get('/{id}', [SurveyUserController::class, 'getSurveyUser']);  // Ver una pregunta específica
    Route::post('/', [SurveyUserController::class, 'newuserSurvey']);       // Crear una nueva pregunta
    Route::put('ruserSurvey}', [SurveyUserController::class, 'update']); // Actualizar una pregunta
    Route::delete('userSurveys}', [SurveyUserController::class, 'destroy']); // Eliminar una pregunta
});

//Endpoint Admin
Route::post('newAdmin',[AuthController::class, 'registerAdmin'] );
Route::get('getAdmin/{id}',[AuthController::class, 'getAdminById']);
Route::get('getAdmins',[AuthController::class, 'getAdmins']);
Route::put('updateAdmin/{id}',[AuthController::class, 'editAdmin']);
Route::delete('deleteAdmin/{id}',[AuthController::class, 'deleteAdmin']);

Route::post('loginA', [AuthController::class, 'loginAdmin']);
Route::post('logoutA', [AuthController::class, 'logoutAdmin']);

//Endpoint School
Route::post('newSchool',[AuthController::class, 'registerSchool']);
Route::get('getSchool/{id}',[AuthController::class, 'getSchoolById']);
Route::get('getSchools',[AuthController::class, 'getSchools']);
Route::put('updateSchool/{id}',[AuthController::class, 'editSchool']);
Route::delete('deleteSchool/{id}',[AuthController::class, 'deleteSchool']);

Route::post('loginS', [AuthController::class, 'loginSchool']);
Route::post('logoutS', [AuthController::class, 'logoutSchool']);

//Enpoint User
Route::post('newUser',[AuthController::class, 'registerUser']);
Route::get('getUser/{id}',[AuthController::class, 'getUserById']);
Route::get('getUsers',[AuthController::class, 'getUsers']);
Route::put('updateUser/{id}',[AuthController::class, 'editUser']);
Route::delete('deleteUser/{id}',[AuthController::class, 'deleteUser']);

Route::post('loginU', [AuthController::class, 'loginUser']);
Route::post('logoutU', [AuthController::class, 'logoutUser']);
