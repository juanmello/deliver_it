<?php

namespace App\Http\Controllers;

use App\Models\ResultadoProva;

class ResultadoCorredores extends Controller
{
    protected $model;
    public function __construct(ResultadoProva $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model
                ->with(["corredorProva" => function($query) {
                    $query->with(["corredores", "provas"]);
                }])
            ->get()
            ->toJson();
    }
}
