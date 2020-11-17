@extends('layouts.app')

@section('contenido')
	<div class="title">
        <h3><b>Ver Partida</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
	        <div class="panel-body"> 
	        	<br>
	        	Codigo:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $partidas->COD_PARTIDA }}</span><br>
                Nombre:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $partidas->NOM_PARTIDA }}</span><br>
                Numero de Partida:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $partidas->NRO_PARTIDA }}</span><br>
                Estado Partida:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $partidas->VALOR }}</span><br>
            </div>
        </div>

    	<div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_partidas') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection