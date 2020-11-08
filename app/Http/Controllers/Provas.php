<?php

namespace App\Http\Controllers;

use App\Models\ProvaCorrida;

class Provas extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;

    public function __construct(ProvaCorrida $model)
    {
        $this->model = $model;
    }
}
