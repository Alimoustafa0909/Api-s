<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Admin extends Authenticatable implements JWTSubject
{
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        // other fillable properties...
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    // Rest of the code
}
