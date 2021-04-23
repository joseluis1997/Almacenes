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
        Partida::create([
            'NOM_PARTIDA' => 'MATERIALES Y SUMINISTROS',
            'NRO_PARTIDA' => 30000,
            'DESCRIPCION'=>'Comprende de la adquisición de articulos, materiales y bienes que se consumen o cambien de valor durante la gestión. Se incluye los materiales que se destinan a conservación y reparación de bienes de capital.'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 1,
            'NOM_PARTIDA' => 'Alimentos y Productos Agroforestales',
            'NRO_PARTIDA' => 31000,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de bebidas y productos alimenticios, manufacturados o no, 1nduye animales vivos para consumo, aceites, grasas animal es y vegetal es, forrajes Y otros alimentos para  animal es; además, comprende productos agrícolas, ganaderos, de silvicultura, caza Y pesca. Comprende madera y productos de este material.'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 2,
            'NOM_PARTIDA' => 'Alimentos y Bebidas para Personas, Desayuno Escolar y Otros',
            'NRO_PARTIDA' => 31100,
            'DESCRIPCION'=>'Gastos destinados al pago de comida y bebida en establecimientos hospitalarios, penitenciarios, de orfandad, cuarteles, aeronaves, y para el personal de seguridad según convenio interinstitucional; incluye pago de refrigerio:al personal permanente, eventual y consultores individuales de linea de cada entidad, por procesos electorales,emergencias y/o desastres naturales; así como  almuerzos o cenas de trabajo según disposición legal, desayuno escota r y otros relacionados de acuerdo a normativa vigente.'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 3,
            'NOM_PARTIDA' => 'Gastos  por   Refrigerios  al  personal  permanente',
            'NRO_PARTIDA' => 31110,
            'DESCRIPCION'=>'eventual  y  consultores individual es de linea de las Instituciones Públicas Incluye pago por refrigerios al personal de seguridad de la Policía Boliviana, según convenio  interinstitucional.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 3,
            'NOM_PARTIDA' => 'Gastos por Alimentación y Otros Similares',
            'NRO_PARTIDA' => 31120,
            'DESCRIPCION'=>'Incluye los efectuados en reuniones, seminarios, y otros eventos; así como los gastos por dotación  de víveres a la Policía Boliviana y Fuerzas Arma das.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 3,
            'NOM_PARTIDA' => 'Desayuno Escolar',
            'NRO_PARTIDA' => 31130,
            'DESCRIPCION'=>'Desayuno Escolar'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 3,
            'NOM_PARTIDA' => 'Alimentacion Hospitalaria, Penitenciaria, Aeronaves y Otras Especificas',
            'NRO_PARTIDA' => 31140,
            'DESCRIPCION'=>'Alimentación Hospitalaria, Penitenciaria,Aeronaves y Otras Especificas'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 3,
            'NOM_PARTIDA' => 'Alimentos y Bebidas para la atencion de emergencias y desastres naturales',
            'NRO_PARTIDA' => 31150,
            'DESCRIPCION'=>'Alimentos y Bebidas para la atención de emergencias y desastres naturales.'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 2,
            'NOM_PARTIDA' => 'Alimentos para Animales',
            'NRO_PARTIDA' => 31200,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de forrajes y otros alimentos para animales de propiedad de  instituciones publicas; alimentación de los animales de propiedad del ejercito y de la Policía  Boliviana, parques zoológicos, laboratorios de experimentación y otros similares'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 2,
            'NOM_PARTIDA' => 'Productos Agricolas Pecuarios y Forestales',
            'NRO_PARTIDA' => 31300,
            'DESCRIPCION'=>'gastos para la adquisición de granos básicos, frutas y flores silvestres, goma, ca?a similares y otros productos agroforestales y agropecuarios en bruto; ademas, gastos por concepto de adquisición de maderas de construcción, puertas, ventanas, vigas, cal lapos, durmientes manufacturados o no, y todo producto proveniente de esta rama, incluido carbón vegetal. Incluye gastos por la compra de ganado y otros animales vivos, destinados al consumo o para usos industriales y científicos; incluye productos derivados de los mismos, como ser leche, huevos, lana, miel, pieles y otros.'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 1,
            'NOM_PARTIDA' => 'Productos de Papel Carton e Impresos',
            'NRO_PARTIDA' => 32000,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de papel y cartón en sus diversas formas y clases; libros y revistas, textos de enseñanza, compra y suscripciones de periódicos'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 11,
            'NOM_PARTIDA' => 'Papel',
            'NRO_PARTIDA' => 32100,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de papel de escritorio y otros'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 11,
            'NOM_PARTIDA' => 'Productos de Artes Graficos',
            'NRO_PARTIDA' => 32200,
            'DESCRIPCION'=>'Gastos para la adquisición de productos de artes graficas y otros relacionados. Incluye gastos destinados a la adquisición de artículos hechos de papel y cartón'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 11,
            'NOM_PARTIDA' => 'Libros Manuales y Revistas',
            'NRO_PARTIDA' => 32300,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de libros, manuales y revistas para las bibliotecas y oficinas'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 11,
            'NOM_PARTIDA' => 'Textos de Enseñanza',
            'NRO_PARTIDA' => 32400,
            'DESCRIPCION'=>'Gastos destinados a la compra de libros para uso docente'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 11,
            'NOM_PARTIDA' => 'Periodicos y Boletines',
            'NRO_PARTIDA' => 32500,
            'DESCRIPCION'=>'Gastos para la compra y suscripciones de periódicos y boletines, incluye gacetas oficinas.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 1,
            'NOM_PARTIDA' => 'Textiles y Vestuarios',
            'NRO_PARTIDA' => 33000,
            'DESCRIPCION'=>'Gastos para la compra de ropa de trabajo, vestuarios, uniformes, adquisición de calzados, hilados, telas de lino, algodon, seda, lana, fibras artificiales y tapices, alfombras, sabanas, toallas, sacos de fibras y otros articulos.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 17,
            'NOM_PARTIDA' => 'Hilados y Telas',
            'NRO_PARTIDA' => 33100,
            'DESCRIPCION'=>'Gastos destinados para la compra de hilados y telas de lino, algodón, seda, lana, y fibras artificiales, no utilizados aun en procesos de confección.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 17,
            'NOM_PARTIDA' => 'Confecciones y Textiles',
            'NRO_PARTIDA' => 33200,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de tapices, alfombras, sabanas, toallas, sacos de fibras, colchones, carpas, cortinas y otros textiles similares.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 1,
            'NOM_PARTIDA' => 'Productos Varios',
            'NRO_PARTIDA' => 39000,
            'DESCRIPCION'=>'Gastos en productos de limpieza, material deportivo, utensilios de cocina y comedor, instrumental menor médico-quirlrgico, útiles de escritorio, de oficina y enseñanza, materiales eléctricos, repuestos y accesorios en general.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 20,
            'NOM_PARTIDA' => 'Materiales de Limpieza',
            'NRO_PARTIDA' => 39100,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de materiales como jabones, detergentes, desinfectantes, panos, cepillos, escobas y otros utilizados en limpieza e higiene de bienes y lugares públicos'
        ]);

        Partida::create([
            'PARTIDA_PADRE'=> 20,
            'NOM_PARTIDA' => 'Material Deportivo y Recreativo',
            'NRO_PARTIDA' => 39200,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de material deportivo. Incluye las compras para proveer material deportivo a las delegaciones deportivas destacadas dentro y fuera del país en representación oficial. Se incluye, ademas, el material destinado a usos recreativos se exceptúan las adquisiciones para donaciones a servidores publicos del estado plurinacional o personas del sector privado, de acuerdo a normativa vigente'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 20,
            'NOM_PARTIDA' => 'utensilios de cocina y comedor',
            'NRO_PARTIDA' => 39300,
            'DESCRIPCION'=>'Gastos destinados a la adquisición de menaje de cocina y vajilla de comedor a ser utilizadas en hospitales, hogares de niños, asilos y otras.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 20,
            'NOM_PARTIDA' => 'Instrumental Menor Medico Quirurgico',
            'NRO_PARTIDA' => 39400,
            'DESCRIPCION'=>'Gastos destinados a la compra de estetoscopios, termémetros, probetas y demas utiles menores médicos quirirgicos utilzados en hospitales, clinicas y demas dependencias médicas del sector publico.'
        ]);
        Partida::create([
            'PARTIDA_PADRE'=> 20,
            'NOM_PARTIDA' => 'Utiles de Escritorio y Oficina',
            'NRO_PARTIDA' => 39500,
            'DESCRIPCION'=>'Gastos destinados a la le adquisición de útiles de escritorio como ser: tintas, lapices, bolígrafos, engrapadoras, perforadoras, calculadoras, medios magnéticos, tóner para impresoras y fotocopiadores y otros destinados al funcionamiento de oficinas.'
        ]);

    }
}
