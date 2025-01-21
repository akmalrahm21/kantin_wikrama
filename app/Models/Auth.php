<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Auth extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username', 'password', 'role'
    ];

    // Add any additional functionality you need here
}
