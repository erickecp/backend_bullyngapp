<?php

namespace App\Http\Controllers;

use App\Models\subsurveys;
use Illuminate\Http\Request;

class SubsurveyController extends Controller
{

    public function index(){
        $surveys = subsurveys::all();
        return response()->json( $surveys );
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $survey = subsurveys::with(['questions', 'videos'])->find($id);
        if (!$survey) {
            return response()->json(['message' => 'Survey not found'], 404);
        }
        return response()->json($survey);
    }

}
