<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\SurveyResponse;
use Illuminate\Http\Request;

class SurveyResponseController extends Controller
{
    //


    public function getResponses(){
        $responses =  SurveyResponse::all();
        return response()->json($responses);
    }

    public function newResponse(Request $request){
        $response = SurveyResponse::create($request->all());
        return response()->json($response);
    }


    public function getResponseByid($id) {

        $survey = SurveyResponse::with(['question', 'survey' , 'schoolUser'])
        ->where('survey_id', $id)
        ->get();

    // Convertimos manualmente el resultado a un array de arrays

        if(is_null($survey)){
            return response()->json(['message'=>'Response not found'], 404);
        }
        return response()->json($survey);
    }

}
