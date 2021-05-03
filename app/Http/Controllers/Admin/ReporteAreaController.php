<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partida;
use App\Area;
use Carbon\Carbon;

class ReporteAreaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $areas = Area::all();
    return view('admin.ReporteArea.index', compact('areas'));
  }

  public $area_ok = FALSE;
  public $fecha_ok = FALSE;
  public $fecha_inicio = " ";
  public $fecha_fin = " ";
  
  public function createReport(Request $request){
    $cod_area = $request->get('area');
    $consumo = $request->get('consumo');
    $option = $request->get('option');
    $mytime = Carbon::now();
    $mytime->toDateTimeString();
    $area = null;

    if($cod_area != null && $cod_area > 0){
      $this->area_ok = TRUE;
      $area =Area::find($cod_area);
      $area = $area->NOM_AREA;
    }
    
    $this->fecha_inicio = $request->get('fecha_inicio');
    $this->fecha_fin = $request->get('fecha_fin');
    if ($this->fecha_inicio != null && $this->fecha_fin != null) {
      $date_inicio = \DateTime::createFromFormat('Y-m-d', $this->fecha_inicio);
      $date_fin = \DateTime::createFromFormat('Y-m-d', $this->fecha_fin);
      if ($date_inicio <= $date_fin) {
        $this->fecha_ok = TRUE;
      }
    }
    // dd($fecha_inicio);
    $areaQuery = Area::query();
    if ($this->area_ok) {
      $areaQuery = $areaQuery->where('COD_AREA', '=', $cod_area);
    }

    $areas = null;

    if ($consumo == 1) {
    	$areas = $areaQuery->with(['ConsumoDirectos' => function($query) {
    		if ($this->fecha_ok) {
          $query->with(['Articulos' => function($query2) {
		        $query2->with(['Medida' => function($query3) {
			        $query3->select('COD_MEDIDA', 'NOM_MEDIDA');
			      }]);
		      }])
		      ->whereDate('FECHA', '>=', $this->fecha_inicio)
          ->whereDate('FECHA', '<=', $this->fecha_fin)
          ->orderBy('COD_CONSUMO_DIRECTO', 'asc');
        }else{
          $query->with(['Articulos' => function($query2) {
		        $query2->with(['Medida' => function($query3) {
			        $query3->select('COD_MEDIDA', 'NOM_MEDIDA');
			      }]);
		      }])
          ->orderBy('COD_CONSUMO_DIRECTO', 'asc');
        }
	    }])->get();
    } else{
    	$areas = $areaQuery->with(['Salidas' => function($query) {
    		if ($this->fecha_ok) {
          $query->with(['Articulos' => function($query2) {
		        $query2->with(['Medida' => function($query3) {
			        $query3->select('COD_MEDIDA', 'NOM_MEDIDA');
			      }]);
		      }])
		      ->whereDate('FECHA', '>=', $this->fecha_inicio)
          ->whereDate('FECHA', '<=', $this->fecha_fin)
          ->orderBy('COD_SALIDA', 'asc');
        }else{
          $query->with(['Articulos' => function($query2) {
		        $query2->with(['Medida' => function($query3) {
			        $query3->select('COD_MEDIDA', 'NOM_MEDIDA');
			      }]);
		      }])
          ->orderBy('COD_SALIDA', 'asc');
        }
	    }])->get();
    }

    //dd($areas[0]);
    if($option == 1){
      if($consumo == 1){
        $repArCD = \PDF::loadView('admin.ReporteArea.ReporteCD', [
        'areas'=> $areas,
        'area_ok'=> $this->area_ok,
        'area'=> $area,
        'fecha_ok'=> $this->fecha_ok,
        'fecha_inicio'=> $this->fecha_inicio,
        'fecha_fin'=> $this->fecha_fin,
        'mytime'=> $mytime,
    ])
    ->setPaper('a4', 'landscape');
    return $repArCD->download('ReporteAreaCD.pdf');
      }else{
        $repArSL = \PDF::loadView('admin.ReporteArea.ReporteSL', [
        'areas'=> $areas,
        'area_ok'=> $this->area_ok,
        'area'=> $area,
        'fecha_ok'=> $this->fecha_ok,
        'fecha_inicio'=> $this->fecha_inicio,
        'fecha_fin'=> $this->fecha_fin,
        'mytime'=> $mytime,
      ])
    ->setPaper('a4', 'landscape');
    return $repArSL->download('ReporteAreaSL.pdf');
      }
    }else if ($option == 2) {
      if($consumo == 1){
        return view('admin.ReporteArea.showCD', [
          'areas'=> $areas,
          'area_ok'=> $this->area_ok,
          'area'=> $area,
          'fecha_ok'=> $this->fecha_ok,
          'fecha_inicio'=> $this->fecha_inicio,
          'fecha_fin'=> $this->fecha_fin,
          'mytime'=> $mytime,
        ]);
      }else{
        return view('admin.ReporteArea.showSL', [
          'areas'=> $areas,
          'area_ok'=> $this->area_ok,
          'area'=> $area,
          'fecha_ok'=> $this->fecha_ok,
          'fecha_inicio'=> $this->fecha_inicio,
          'fecha_fin'=> $this->fecha_fin,
          'mytime'=> $mytime,
        ]);
      }
    }else{
      return redirect()->route('list_area_egresos_salidas')->with('message', ['danger', 'Error, Debe Seleccionar una Opcion']);
    }
    
  }
}
