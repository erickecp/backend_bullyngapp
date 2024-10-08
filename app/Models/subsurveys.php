<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsurveys extends Model
{
    use HasFactory;
    protected $fillable = ['title','survey_id'];
    public function questions()
    {
        return $this->hasMany(question::class);
    }
    public function videos()
    {
        return $this->hasMany(video::class);
    }

}
