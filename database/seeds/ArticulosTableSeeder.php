<?php

use Illuminate\Database\Seeder;
use App\Partida;
use App\Medida;
use App\Articulo;
class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // $Articulos = [
       // 		[
       //          'COD_PARTIDA' => '1',
       //      ],
       //      [
       //          'COD_MEDIDA' => '1',
       //      ],
       //      [
       //          'NOM_ARTICULO' => 'Te en bolsitas',
       //      ],
       //      [
       //          'DESC_ARTICULO' => 'te en bolsitas de canela de sopar',
       //      ],
       //      [
       //          'CANT_ACTUAL' => '100',
       //      ],
       //      [
       //          'CANT_MINIMA' => '20',
       //      ],
       //      [
       //          'UBICACION' => 'Recuros Humanos',
       //      ],
       //      [
       //          'TIPO' => 'Productos de Urgencias' ,
       //      ],
       //      [
       //          'ESTADO_ARTICULO' => true,
       //      ],
       //  ];

       //  foreach ($Articulos as $articulo) {
       //      Articulo::create($articulo);
       //  }

        Articulo::create([
            'COD_PARTIDA' => 1,
            'FK_COD_MEDIDA' => 1,
            // 'ITEM'=>3110,
            'NOM_ARTICULO' =>'Te en bolsitas',
            'DESC_ARTICULO' =>'te en bolsitas de canela de sopar',
            'CANT_ACTUAL' => 20,
            // 'CANT_MINIMA' => 10,
            // 'UBICACION' => 'Recuros Humanos',
            // 'TIPO' => 'Productos de Urgencias',
        ]);
    }
}
