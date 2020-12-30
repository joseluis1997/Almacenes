<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area;
use App\Http\Requests\AreaRequest;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Area::all();
        return view('admin.areas.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all()->where('ESTADO_AREA', '=', 1);
        return view('admin.areas.crear', compact('areas'));
    }

    /**
      * Store a newly created resource in storage.
      *
      * @param  App\Http\Requests\AreaRequest  $area_request
      * @return \Illuminate\Http\Response
      */
    public function store(AreaRequest $area_request)
    {

        try {
          Area::create($area_request->input());
          return redirect()->route('list_areas')->with('message', ['success', 'Nueva area creada']);
        } catch (\Illuminate\Database\QueryException $e) {
            error_log($e->getMessage());
          return redirect()->route('list_areas')->with('message', ['danger', 'Erro al crear la nueva area']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_area = Area::find($id);
        return view('admin.areas.show',['show' => $show_area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        if ($area->COD_AREA == 1) {
             abort(403, 'Acción no autorizada.');
        }

        $areas = Area::all()->where('ESTADO_AREA', '=', 1)->where('COD_AREA', '<>', $area->COD_AREA);
        return view('admin.areas.editar', compact('area', 'areas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $area_request, Area $area)
    {
        try {
            if ($area->COD_AREA == 1) {
              abort(403, 'Acción no autorizada.');
            }
            
            $area->fill($area_request->input())->save();
            return redirect()->route('list_areas')->with('message', ['success', 'Area modificada correctamente!']);
        } catch (\Illuminate\Database\QueryException $e) {
            error_log($e->getMessage());
            return redirect()->route('list_areas')->with('message', ['danger', 'Erro al modificar el area']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $estado = true;

        if ($area->ESTADO_AREA) {
          $estado = false;
        }

        $area->ESTADO_AREA = $estado;
        $area->save();

        if ($estado) {
          return redirect()->route('list_areas')->with('message', ['success', 'Area habilitado Correctamente!']);  
        }else{
          return redirect()->route('list_areas')->with('message', ['success', 'Area Desabilitado Correctamente!']);
        }
    }
}
