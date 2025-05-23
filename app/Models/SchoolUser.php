<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class SchoolUser extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'password',
        'school_id',
    ];

    public function school(){
        return $this->belongsTo(School::class, 'school_id');
    }

    public function surveys()
{
    return $this->belongsToMany(Survey::class, 'survey_users')->withTimestamps();
}

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
