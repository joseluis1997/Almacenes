<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use DB;

class InventarioActualController extends Controller
{

   public function index(){
     return view('admin.ReporteInventarioActual.index');
   }

   public function ReporteInventarioActualPDF(){
   	// $partidas = Partida::with(['Articulos' => function($query) {
    //     $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
    //     });
    // }])->get();

   	// $partidas = Partida::with(['Articulos' => function($query) {
    //     $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, COUNT(CANTIDAD) as total_cantidad, SUM(PRECIO_UNITARIO) as total_precio FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
    //     });
    // }])->get();

      $partidas = Partida::where('COD_PARTIDA', '=' , )->with(['Articulos' => function($query) {
        $query->leftJoin(DB::raw('(SELECT COD_ARTICULO, COUNT(CANTIDAD) as total_cantidad, SUM(PRECIO_UNITARIO) as total_precio FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
            $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
        });
    }])->get();

    // $partidas = Partida::with(['Articulos' => function($query) {
    //     $query->with(['ComprasStocks' => function($query2) {
    //     	$query2->orderBy('COD_COMPRA_STOCK', 'desc');
    //     }]);
    // }])->get();

   	// dd($partidas[0]->Articulos);

   	// TODO => Consulta para sacar solo de un articulo
   	// $articulos = Articulo::leftJoin(DB::raw('(SELECT COD_ARTICULO as CD, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
    //         $join->on('detalle.CD', '=', 'ARTICULO.COD_ARTICULO');
    //         $join->where('detalle.CD','=',1) ;
    //     })->where('COD_ARTICULO','=',1)->get();
   	// dd($articulos);


    // return view('admin.ReporteInventarioActual.RepInventarioActual', compact('partidas'));

    $reporteInventarioActual = \PDF::loadView('admin.ReporteInventarioActual.RepInventarioActual', compact('partidas'));

    
    return $reporteInventarioActual->download('admin.ReporteInventarioActual.RepInventarioActual.pdf');
   }
}