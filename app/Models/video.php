<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'ruta','survey_id'];
    public function subsurvey(){
        return $this->belongsTo(Survey::class);
    }
}
