<?php

namespace App\Http\Controllers;

use App\Models\survey;
use Illuminate\Http\Request;

class surveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $surveys = Survey::all();
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
        $survey = Survey::with(['questions', 'videos'])->find($id);
        if (!$survey) {
            return response()->json(['message' => 'Survey not found'], 404);
        }
        return response()->json($survey);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
