<?php

namespace App\Http\Controllers;

use App\Models\survey;
use App\Models\Survey_response;
use Illuminate\Http\Request;

class surveyResponseController extends Controller
{
    //


    public function getResponses(){
        $responses =  Survey_response::all();
        return response()->json($responses);
    }

    public function newResponse(Request $request){
        $response = Survey_response::create($request->all());
        return response()->json($response);
    }


    public function getResponseByid($id) {

        $survey = Survey_response::with(['question', 'survey' , 'schoolUser'])
        ->where('survey_id', $id)
        ->get();

    // Convertimos manualmente el resultado a un array de arrays

        if(is_null($survey)){
            return response()->json(['message'=>'Response not found'], 404);
        }
        return response()->json($survey);
    }

}
