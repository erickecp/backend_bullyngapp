<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'ruta','survey_id'];
    public function survey(){
        return $this->belongsTo(survey::class);
    }
}
