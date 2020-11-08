<?php

namespace App\Http\Controllers;

use App\Models\Corredor;

class Corredores extends Controller
{
    use \App\Http\Controllers\ApiControllerTrait;

    protected $model;

    public function __construct(Corredor $model)
    {
        $this->model = $model;
    }
}
