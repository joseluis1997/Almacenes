@extends('layouts.app')

@section('contenido')
	<div class="title">
        <h3><b>Ver Rol</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
	        <div class="panel-body">
	        	<label class="formulario__label">Nombre:<span class="badge badge-info">{{ $role->name }}</span></label>
	        	<label class="formulario__label">Descripcion:
                    <textarea class="form-control formulario__input" rows="3">{{ $role->descripcion }}</textarea>
	        	</label>
		       {{--  <strong> Nombre:</strong>
		            <span class="badge badge-info">{{ $role->name }}</span><br><br>
		        <strong>Descripcion:</strong>
		            <span class="badge badge-info">{{ $role->descripcion }}</span><br> --}}

	        </div><br>
	        <div class="panel-body">
	        	<strong>Permisos</strong>
			        @foreach ($role->permissions as $permission)
		                <span class="badge badge-info">{{ $permission->name }}</span>
		            @endforeach
            </div>
        </div>

    	<div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_roles') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection