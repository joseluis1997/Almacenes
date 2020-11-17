@extends('layouts.app')

@section('contenido')
	<div class="title">
        <h3><b>Ver Unidad de Medida</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
	        <div class="panel-body"> 
	        	<br>
	        	Codigo:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $medidas->COD_MEDIDA }}</span><br>
	        	Nombre:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $medidas->NOM_MEDIDA}}</span><br>
	        	Descripcion:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $medidas->DESC_MEDIDA}}</span><br>
	        	Estado:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $medidas->ESTADO_MEDIDA}}</span>
            </div>
        </div>

    	<div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_medidas') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection