<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Corredor extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'corredores';
    protected $guarded = ['id'];
}
