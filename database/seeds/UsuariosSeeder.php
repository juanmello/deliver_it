<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $corredores = \App\Models\Corredor::all();

        $corredores->each(function ($corredor)  {
            $faker = \Faker\Factory::create('pt_BR');
            DB::table('usuarios')
                ->insert([
                    'corredores_id' => $corredor->id,
                    'email' => $faker->email,
                    'password' => bcrypt('caue'),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
        });
    }
}
