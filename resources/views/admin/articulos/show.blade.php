@extends('layouts.app')

@section('contenido')
    <div class="title">
        <h3><b>Ver Articulo</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <div class="panel-body">
                <strong>codigo Articulo:</strong>                                       
                    <span class="badge badge-info">{{$articulo->COD_ARTICULO}}</span><br>
                <strong>Nombre Articulo:</strong>                                       
                    <span class="badge badge-info">{{$articulo->NOM_ARTICULO}}</span><br>
                <strong>Unidad de Medida del Articulo:</strong>                          
                    <span class="badge badge-info">{{$articulo->Medida->NOM_MEDIDA}}</span><br>
                <strong>Partida Articulo:</strong>                                       
                    <span class="badge badge-info">{{$articulo->Partida->NRO_PARTIDA}}
                        | {{ $articulo->Partida->NOM_PARTIDA }}</span><br>
                <strong>Cantidad Articulo:</strong>                                       
                    <span class="badge badge-info">{{$articulo->CANT_ACTUAL}}</span><br>
                <strong>Descripcion Articulo:</strong>                                       
                    <span class="badge badge-info">{{$articulo->DESC_ARTICULO}}</span><br>
                <strong>Estado Articulo:</strong> 
                    @if($articulo->ESTADO_ARTICULO == 1)                                      
                        <span class="badge badge-success">Disponible</span><br>
                    @else
                        <span class="badge badge-danger">Agotado</span><br>
                    @endif
            </div><br>
        </div>

        <div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_articulos') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection