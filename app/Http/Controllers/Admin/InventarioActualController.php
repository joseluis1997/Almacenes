<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use DB;

class InventarioActualController extends Controller
{

   public function index(){
     return view('admin.ReporteInventarioActual.index');
   }

   public function ReporteInventarioActualPDF(){
   	$articulos = Articulo::leftJoin(DB::raw('(SELECT COD_ARTICULO, SUM(CANTIDAD*PRECIO_UNITARIO) as total FROM DETALLE_COMPRA_STOCK GROUP BY COD_ARTICULO) as detalle'), function ($join) {
            $join->on('detalle.COD_ARTICULO', '=', 'ARTICULO.COD_ARTICULO');
        })->get();
   	// dd($articulos);


    // return view('admin.ReporteInventarioActual.RepInventarioActual', compact('articulos'));

    $reporteInventarioActual = \PDF::loadView('admin.ReporteInventarioActual.RepInventarioActual', compact('articulos'));

    
    return $reporteInventarioActual->download('admin.ReporteInventarioActual.RepInventarioActual.pdf');
   }
}
