<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResultadosProvas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados_provas', function (Blueprint $table) {
            $table->unsignedInteger('corredor_prova_id');
            $table->dateTime('hora_conclusao_prova');
            $table->unsignedInteger('posicao_corredor');
            $table->timestamps();

            $table->foreign('corredor_prova_id')
                ->references('id')
                ->on('corredores_provas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->primary(['corredor_prova_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados_provas');
    }
}
