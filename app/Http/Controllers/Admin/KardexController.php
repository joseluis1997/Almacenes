<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;

class KardexController extends Controller
{

  public function index()
  {
    $Articulos = Articulo::all();
    return view('admin.Kardex.index', compact('Articulos'));
  }
      
  public $articulo_ok = FALSE;
  public function kardex(Request $request){
    $cod_articulo = $request->get('articulo');

    $articulo = null;

    if($cod_articulo != null && $cod_articulo > 0){
      $articulo =Articulo::with(['Medida' => function($query) {
        $query->select('COD_MEDIDA', 'NOM_MEDIDA');
      }])
      ->with(['Partida' => function($query) {
        $query->select('COD_PARTIDA', 'NOM_PARTIDA', 'NRO_PARTIDA');
      }])
      ->find($cod_articulo);
      $this->articulo_ok = TRUE;
    }

    // dd($articulo);

    $collections = collect();
    $Compras = $articulo->ComprasStocks()->with(['Area' => function($query) {
        $query->select('COD_AREA', 'NOM_AREA');
      }])->get();
    $Salidas = $articulo->Salidas()->with(['Area' => function($query) {
        $query->select('COD_AREA', 'NOM_AREA');
      }])->get();
    $ConsumosDirectos = $articulo->ConsumosDirectos()->with(['Area' => function($query) {
        $query->select('COD_AREA', 'NOM_AREA');
      }])->get();
    $collections = $Compras->concat($Salidas)->concat($ConsumosDirectos);
    $collections = $collections->sortBy('FECHA');

    // dd($collections);

    // $kardex = \PDF::loadView('admin.Kardex.kardex')
    // ->setPaper('a4', 'landscape');
    // return $kardex->download('kardex.pdf');

    return view('admin.Kardex.kardex', compact('collections', 'articulo'));
  }
}
