<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $fillable = ['question', 'answers','category','survey_id'];
    protected $casts = [
        'answers' => 'array',
    ];

    public function survey(){
        return $this->belongsTo(survey::class);
    }

}
