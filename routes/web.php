<?php

Route::get('/', function () {
    return \Illuminate\Support\Facades\Response::json([
        "connected" => true,
        "message" => "Deliver IT Teste"
    ]);
});
