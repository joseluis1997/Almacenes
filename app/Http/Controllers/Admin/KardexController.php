<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Articulo;
use Carbon\Carbon;

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
    $option = $request->get('option');
    $mytime = Carbon::now();
    $mytime->toDateTimeString();

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



    if($option == 1){
      $kardex = \PDF::loadView('admin.Kardex.kardex',[
        'collections' => $collections,
        'articulo' => $articulo,
        'mytime'=> $mytime,
      ])
      ->setPaper('a4', 'landscape');
      return $kardex->download('kardex.pdf');
    }else if($option == 2){
      return view('admin.Kardex.show', compact('collections', 'articulo','mytime'));
    }else{
      return redirect()->route('list_kardexAlmacen')->with('message', ['danger', 'Error, Debe Seleccionar una Opcion']);
    }

    // return view('admin.Kardex.kardex', compact('collections', 'articulo'));
  }
}
