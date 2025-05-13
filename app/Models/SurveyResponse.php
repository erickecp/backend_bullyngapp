<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $fillable = ['school_users_id', 'question_id','response', 'survey_id'];
    use HasFactory;
    protected $casts = [
        'response' => 'array'
    ];

    public function question()
{
    return $this->belongsTo(Question::class);
}

public function survey()
{
    return $this->belongsTo(Survey::class);
}

public function schoolUser()
{
    return $this->belongsTo(SchoolUser::class, 'school_users_id');
}



}
