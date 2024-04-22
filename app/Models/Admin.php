<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

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
