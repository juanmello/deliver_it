<?php

use Illuminate\Http\Request;

Route::get('/login', 'PassportController@getLogin')->name('login');
Route::post('/login', 'PassportController@postLogin')->name('post_login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'corredores'], function () {
        Route::get('/', 'Corredores@index');
        Route::post('/', 'Corredores@store');
        Route::get('/{id}', 'Corredores@show');
        Route::match(['put', 'patch'], '/{id}', 'Corredores@update');
        Route::delete('/{id}', 'Corredores@destroy');
    });

    Route::group(['prefix' => 'provas'], function () {
        Route::get('/', 'Provas@index');
        Route::post('/', 'Provas@store');
        Route::get('/{id}', 'Provas@show');
        Route::match(['put', 'patch'], '/{id}', 'Provas@update');
        Route::delete('/{id}', 'Provas@destroy');
    });

    Route::get('/corredores-provas', 'CorredoresProvas@index');
    Route::get('/resultado-provas', 'ResultadoCorredores@index');

});
