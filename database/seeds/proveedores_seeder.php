<?php

use Illuminate\Database\Seeder;
use App\proveedor;

class proveedores_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        proveedor::create([
            'NIT' => 123456789012,
            'NOM_PROVEEDOR' => 'Pil Tarija',
            'DIR_PROVEEDOR' => 'Avenida la paz y Circunvalacion',
            'TELEF_PROVEEDOR' => '(+591) 76489562',
        ]);
        proveedor::create([
            'NIT' => 184786023,
            'NOM_PROVEEDOR' => 'Papelera Tarija',
            'DIR_PROVEEDOR' => 'Calle colon entre avaroa y avenida vicotr paz',
            'TELEF_PROVEEDOR' => '68705066'
        ]);
        proveedor::create([
            'NIT' => 3202826012,
            'NOM_PROVEEDOR' => 'Ferreteria Mary',
            'DIR_PROVEEDOR' => 'Calle colon y avenida Circunvalacion',
            'TELEF_PROVEEDOR' => '75148956'
        ]);
        proveedor::create([
            'NIT' => 678934013,
            'NOM_PROVEEDOR' => 'Libreria Nuevos tiempos',
            'DIR_PROVEEDOR' => 'Calle colon N 437 zona central',
            'TELEF_PROVEEDOR' => '66423674'
        ]);
        proveedor::create([
            'NIT' => 153268924,
            'NOM_PROVEEDOR' => 'Comercial stadium',
            'DIR_PROVEEDOR' => ' Potosi N 634 Enter junin y OConnor zona la Pampa',
            'TELEF_PROVEEDOR' => '66-37440'
        ]);
    }
}
