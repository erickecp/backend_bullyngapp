<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyUser extends Model
{
    use HasFactory;
    protected $fillable = ['school_user_id','survey_id'];
}
