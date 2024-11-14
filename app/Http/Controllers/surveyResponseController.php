<?php

namespace App\Http\Controllers;

use App\Models\survey;
use App\Models\survey_response;
use Illuminate\Http\Request;

class surveyResponseController extends Controller
{
    //


    public function getResponses(){
        $responses =  survey_response::all();
        return response()->json($responses);
    }

    public function newResponse(Request $request){
        $response = survey_response::create($request->all());
        return response()->json($response);
    }


    public function getResponseByid($id) {

        $survey = survey_response::with(['question', 'survey' , 'schoolUser'])
        ->where('survey_id', $id)
        ->get();

    // Convertimos manualmente el resultado a un array de arrays

        if(is_null($survey)){
            return response()->json(['message'=>'Response not found'], 404);
        }
        return response()->json($survey);
    }

}
