<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CorredoresProvas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corredores_provas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('corredor_id');
            $table->unsignedInteger('prova_id');

            $table->foreign('corredor_id')
                ->references('id')
                ->on('corredores')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->foreign('prova_id')
                ->references('id')
                ->on('provas_corridas')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corredores_provas');
    }
}
