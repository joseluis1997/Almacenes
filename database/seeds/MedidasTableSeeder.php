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
        Medida::create([
            'NOM_MEDIDA' => 'Kg',
            'DESC_MEDIDA' => 'Unidad de medida para articulos que se miden en kilogramos'
        ]);

        Medida::create([
            'NOM_MEDIDA' => 'LT',
            'DESC_MEDIDA' => 'Unidad de medida para articulos que se miden en litros'
        ]);

        Medida::create([
            'NOM_MEDIDA' => 'Bolsa',
            'DESC_MEDIDA' => 'Unidad de medida en bolsas'
        ]);

        Medida::create([
            'NOM_MEDIDA' => 'Caja',
            'DESC_MEDIDA' => 'Unidad de medida para articulos que s compra por cajas.'
        ]);

        Medida::create([
            'NOM_MEDIDA' => 'Paquete',
            'DESC_MEDIDA' => 'Unidad de medida para articulos que llegan por paquetes.'
        ]);
    }
}
