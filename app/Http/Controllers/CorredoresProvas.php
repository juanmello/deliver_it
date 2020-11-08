<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CorredorProva;

class CorredoresProvas extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;
    protected $relationships = ['corredores', 'provas'];

    public function __construct(CorredorProva $model)
    {
        $this->model = $model;
    }
}
