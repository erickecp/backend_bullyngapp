<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answers','url','category'];
    protected $casts = [
        'answers' => 'array'
    ];

    public function subsurvey(){
        return $this->belongsTo(survey::class, );
    }

}
