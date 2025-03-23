<?php

namespace App\Http\Controllers;

use App\Models\SchoolUser;
use App\Models\SurveyUser;
use App\Models\User;
use Illuminate\Http\Request;

class SurveyUserController extends Controller
{

    public function getsurveyUsers(){
        $responses =  SurveyUser::all();
        return response()->json($responses);
    }

    public function newuserSurvey(Request $request){
        $response = SurveyUser::create($request->all());
        return response()->json($response);
    }

    public function getSurveyUser( $id){
        $user = SchoolUser::find($id);
        if(is_null($user)){
            return response()->json(['message'=>'User not found'], 404);
        };
        $answeredSurveys = $user->surveys;
        return response()->json($answeredSurveys);
    }

}
