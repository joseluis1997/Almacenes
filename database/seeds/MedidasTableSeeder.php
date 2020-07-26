<?php

use Illuminate\Database\Seeder;
use App\Medida;
class MedidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $medidas = [
        //     [
        //         'NOM_MEDIDA' => 'Kg',
        //     ],
        //     [
        //         'DESC_MEDIDA' => 'Unidad de medida kilogramos',
        //     ],
        //     [
        //         'ESTADO_MEDIDA' => 1,
        //     ],
        // ];

        // foreach ($medidas as $medida) {
        //     Medida::create($medida);
        // }
        Medida::create([
            'NOM_MEDIDA' => 'Kg',
            'DESC_MEDIDA' => 'Unidad de medida kilogramos'
            
        ]);
    }
}
