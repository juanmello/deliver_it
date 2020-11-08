<?php

use Illuminate\Database\Seeder;

class CorredoresProvasResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provasCalendario = \App\Models\CorredorProva::orderBy('prova_id')
            ->groupBy('prova_id')
        ->get(['prova_id']);

        $provasCalendario->each(function ($prova) {
            $provaCorrida = \App\Models\ProvaCorrida::select('data_prova')
                ->where('id', $prova->prova_id)
                ->first();

            if ($provaCorrida->data_prova > \Carbon\Carbon::now()) {
                return true;
            }

            $horarioFinalProva = $provaCorrida->data_prova->addHour(rand(1, 7))
                ->addMinutes(rand(0, 59))->addSeconds(rand(0, 59));

            $corredores = \App\Models\CorredorProva::select('id', 'corredor_id')
                ->where('prova_id', $prova->prova_id)->get();

            $corredores->each(function ($corredor, $index) use ($horarioFinalProva) {
                $posicao = $index + 1;
                DB::table('resultados_provas')
                    ->insert([
                        'corredor_prova_id' => $corredor->id,
                        'hora_conclusao_prova' => $horarioFinalProva,
                        'posicao_corredor' => $posicao,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]);

            });
        });
    }
}
