<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


class admin extends Authenticatable
{
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        // other fillable properties...
    ];

    // Rest of the code
}
