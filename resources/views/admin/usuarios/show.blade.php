@extends('layouts.app')
@section('contenido')
	<div class="title">
        <h3><b>Ver Usuario</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
	        <div class="panel-body"> 
	        	<br>
	        	Codigo:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->id }}</span><br>
	        	Cedula:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->CI }}</span><br>
	        	Nombre:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->NOM_USUARIO }}</span><br>
	        	Apellidos:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->APELLIDO }}</span><br>
	        	Telefono:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->TELEFONO }}</span><br>
	        	Nombre de Usuario:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->NOM_USUARIO }}</span><br>
	        	Estado de Usuario:&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-info">{{ $usuario->ESTADO_USUARIO }}</span><br>
            </div>
        </div>

    	<div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_users') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection