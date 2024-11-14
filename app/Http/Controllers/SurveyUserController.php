<?php

namespace App\Http\Controllers;

use App\Models\schoolUser;
use App\Models\surveyUser;
use App\Models\User;
use Illuminate\Http\Request;

class SurveyUserController extends Controller
{

    public function getsurveyUsers(){
        $responses =  surveyUser::all();
        return response()->json($responses);
    }

    public function newuserSurvey(Request $request){
        $response = surveyUser::create($request->all());
        return response()->json($response);
    }

    public function getSurveyUser( $id){
        $user = schoolUser::find($id);
        if(is_null($user)){
            return response()->json(['message'=>'User not found'], 404);
        };
        $answeredSurveys = $user->surveys;
        return response()->json($answeredSurveys);
    }

}
