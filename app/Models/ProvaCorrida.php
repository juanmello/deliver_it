<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvaCorrida extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'provas_corridas';
    protected $guarded = ['id'];
    protected $dates = ['data_prova'];
}
