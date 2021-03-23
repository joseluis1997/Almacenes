<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use App\Partida;
use DB;

class ConsolidadoFisicoValoradoTotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $partidas = Partida::all();
        return view('admin.ReporteConsolidadoValoradoTotal.index', compact('partidas'));
    }
    public $partida_ok = FALSE;

    public function RepConsolidadoValoradoTotal(Request $request){

        $cod_partida = $request->get('partida');
        $partida = null;

        if($cod_partida != null && $cod_partida > 0){
          $this->partida_ok = TRUE;
          $partida = Partida::find($cod_partida);
          $partida = $partida->NRO_PARTIDA;
        }
     
        $partidaQuery = Partida::query();
        if ($this->partida_ok) {
            $partidaQuery = $partidaQuery->where('COD_PARTIDA', '=', $cod_partida);
        }

       $partidas = $partidaQuery->with(['Articulos' => function($query) {
            $query->with(['ComprasStocks' => function($query2) {
            }]);
            $query->with(['Salidas'=>function($query){
                
            }]);

        }])
        ->get();
        // dd($partidas);


     return view('admin.ReporteConsolidadoValoradoTotal.RepConsolidadoValTotal',[

        'partidas'=>$partidas,
    ]);

    
        // return $reporteInventarioActual->download('RepConValTotal.pdf');
    }
}
