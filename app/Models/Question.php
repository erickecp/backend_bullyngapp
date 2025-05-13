<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answers','question_2','url','category'];
    protected $casts = [
        'answers' => 'array'
    ];

    public function subsurvey(){
        return $this->belongsTo(Survey::class, );
    }

    public function surveyResponses()
{
    return $this->hasMany(SurveyResponse::class);
}

}
