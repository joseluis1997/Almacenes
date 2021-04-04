@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Ver Articulo</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
              <div class="panel-body"> 
                <br>
                <label class="formulario__label">codigo Articulo:<span class="badge badge-info">{{$articulo->COD_ARTICULO}}</span></label>
                <label class="formulario__label">Nombre Articulo:<span class="badge badge-info">{{$articulo->NOM_ARTICULO}}</span></label>
                <label class="formulario__label">Unidad de Medida del Articulo:<span class="badge badge-info">{{$articulo->Medida->NOM_MEDIDA}}</span></label>
                <label class="formulario__label">Partida Articulo:<span class="badge badge-info">{{$articulo->Partida->NRO_PARTIDA}}|{{ $articulo->Partida->NOM_PARTIDA }}</span></label>
                <label class="formulario__label">Cantidad Articulo:<span class="badge badge-info">{{$articulo->CANT_ACTUAL}}</span></label>
                <label class="formulario__label">Marca Articulo:<span class="badge badge-info">{{$articulo->MARCA}}</span></label>

                @if($articulo->ESTADO_ARTICULO)
                        <label class="formulario__label">Estado Partida:<span class="badge badge-success">Habilitado</span></label>
                    @else
                        <label class="formulario__label">Estado Partida:<span class="badge badge-danger">Deshabilitado</span></label>
                @endif
                <label class="formulario__label">Descripcion Articulo:</label>
                    <textarea class="form-control formulario__input" rows="5">{{$articulo->DESC_ARTICULO}}</textarea>
            </div>
        </div>

        <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_articulos') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection