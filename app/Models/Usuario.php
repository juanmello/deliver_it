<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
