<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function videos()

    {
        return $this->hasMany(Video::class);
    }
    public function questions()

    {
        return $this->hasMany(Question::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'survey_user')->withTimestamps();
}

public function surveyResponses()
{
    return $this->hasMany(Survey_response::class);
}


}
