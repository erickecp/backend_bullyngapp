<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function videos()

    {
        return $this->hasMany(video::class);
    }
    public function questions()

    {
        return $this->hasMany(question::class);
    }


}
