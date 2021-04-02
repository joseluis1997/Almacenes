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
        
    // public $articulo_ok = FALSE;
    public function kardex(Request $request){
        // $cod_articulo = $request->get('articulo');

        // $articulo = null;

        // if($cod_articulo != null && $cod_articulo > 0){
        //   $this->articulo_ok = TRUE;
        //   $articulo =Articulo::find($cod_articulo);
        //   $articulo = $articulo->NOM_ARTICULO;
        // }






        // $kardex = \PDF::loadView('admin.Kardex.kardex')
        // ->setPaper('a4', 'landscape');
        // return $kardex->download('kardex.pdf');

        return view('admin.Kardex.kardex');
    }
}
