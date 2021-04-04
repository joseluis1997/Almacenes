@extends('layouts.app')

@section('contenido')
	<div class="title">
        <h3><b>Ver Partida</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
	        <div class="panel-body"> 
	        	<br>
                <label class="formulario__label">Codigo:<span class="badge badge-info">{{ $partidas->COD_PARTIDA }}</span></label>
                <label class="formulario__label">Nombre:<span class="badge badge-info">{{ $partidas->NOM_PARTIDA }}</span></label>
                <label class="formulario__label">Numero de Partida:<span class="badge badge-info">{{ $partidas->NRO_PARTIDA }}</span></label>
                @if($partidas->ESTADO_PARTIDA)
                        <label class="formulario__label">Estado Partida:<span class="badge badge-success">Habilitado</span></label>
                    @else
                        <label class="formulario__label">Estado Partida:<span class="badge badge-danger">Deshabilitado</span></label>
                @endif
                <label class="formulario__label">Descripcion:</label>
                    <textarea class="form-control formulario__input" rows="5">{{ $partidas->DESCRIPCION}}</textarea>
            </div>
        </div>

    	<div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_partidas') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection