<?php

use Illuminate\Database\Seeder;
use App\Partida;
class PartidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $partidas = [
        //     [
        //         'NOM_PARTIDA' => 'Desayuno escolar',
        //     ],
        //     [
        //         'PADRE' => '',
        //     ],
        //     [
        //         'NRO_PARTIDA' => 31110,
        //     ],
        //     [
        //         'VALOR' => true,
        //     ],
        // ];

        // foreach ($partidas as $partida) {
        //     Partida::create($partida);
        // }

        Partida::create([
            'NOM_PARTIDA' => 'Desayuno escolar',
            'NRO_PARTIDA' => 31110,
        ]);
    }
}
