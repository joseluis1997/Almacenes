<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partida;
use App\Area;

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
  
  public function createReport(Request $request){
    $cod_area = $request->get('area');
    $consumo = $request->get('consumo');
    $area = null;

    if($cod_area != null && $cod_area > 0){
      $this->area_ok = TRUE;
      $area =Area::find($cod_area);
      $area = $area->NOM_AREA;
    }
    
    $fecha_inicio = $request->get('fecha_inicio');
    $fecha_fin = $request->get('fecha_fin');
    if ($fecha_inicio != null && $fecha_fin != null) {
      $date_inicio = \DateTime::createFromFormat('Y-m-d', $fecha_inicio);
      $date_fin = \DateTime::createFromFormat('Y-m-d', $fecha_fin);
      if ($date_fin > $date_fin) {
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

    if ($consumo == 1) {

      $repArCD = \PDF::loadView('admin.ReporteArea.ReporteCD', [
        'areas'=> $areas,
        'area_ok'=> $this->area_ok,
        'area'=> $area,
        'fecha_ok'=> $this->fecha_ok,
        'fecha_inicio'=> $fecha_inicio,
        'fecha_fin'=> $fecha_fin,
    ])
    ->setPaper('a4', 'landscape');
    return $repArCD->download('ReporteAreaCD.pdf');

    // 	return view('admin.ReporteArea.ReporteCD', [
		  //   'areas'=> $areas,
		  //   'area_ok'=> $this->area_ok,
		  //   'area'=> $area,
		  //   'fecha_ok'=> $this->fecha_ok,
		  //   'fecha_inicio'=> $fecha_inicio,
		  //   'fecha_fin'=> $fecha_fin,
		  // ]);
    } else{

       $repArSL = \PDF::loadView('admin.ReporteArea.ReporteSL', [
        'areas'=> $areas,
        'area_ok'=> $this->area_ok,
        'area'=> $area,
        'fecha_ok'=> $this->fecha_ok,
        'fecha_inicio'=> $fecha_inicio,
        'fecha_fin'=> $fecha_fin,
    ])
    ->setPaper('a4', 'landscape');
    return $repArSL->download('ReporteAreaSL.pdf');
    	// return view('admin.ReporteArea.ReporteSL', [
	    //   'areas'=> $areas,
	    //   'area_ok'=> $this->area_ok,
	    //   'area'=> $area,
	    //   'fecha_ok'=> $this->fecha_ok,
	    //   'fecha_inicio'=> $fecha_inicio,
	    //   'fecha_fin'=> $fecha_fin,
	    // ]);
    }

    

    // $reporteInventarioActual = \PDF::loadView('admin.ReporteArea.ReporteCD', [
    //   'areas'=> $areas,
    //   'area_ok'=> $this->area_ok,
    //   'partida'=> $partida,
    //   'fecha_ok'=> $this->fecha_ok,
    //   'fecha_inicio'=> $fecha_inicio,
    //   'fecha_fin'=> $fecha_fin,
    // ])
    // ->setPaper('a4', 'landscape');
    // return $reporteInventarioActual->download('ReporteArea.pdf');
  }
}
