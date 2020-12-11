@extends('layouts.app')
@section('contenido')
	<div class="title">
        <h3><b>Ver Usuario</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
	        <div class="panel-body"> 
                <div class="col-lg-6 order-lg-0 text-center profile-avatar" >
                    <h2 class="text-center font-weight-light">Foto de Perfil</h2>
                    <div id="preview">  
                        @if($usuario->imagen != " ")
                            <img src="{{ asset('/images/users/'.$usuario->imagen) }}" class="img img-fluid rounded-circle" alt="avatar" />
                        @else
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
                        @endif
                    </div><br>
        	        	<b>Codigo:</b><span class="badge badge-info">{{ $usuario->id }}</span><br>
                        <b>Cedula:</b><span class="badge badge-info">{{ $usuario->CI }}</span><br>
                        <b>Nombre:</b><span class="badge badge-info">{{ $usuario->NOM_USUARIO }}</span><br>
                        <b>Apellidos:</b><span class="badge badge-info">{{ $usuario->APELLIDO }}</span><br>
                        <b>Telefono:</b><span class="badge badge-info">{{ $usuario->TELEFONO }}</span><br>
                        <b>Nombre de Usuario:</b><span class="badge badge-info">{{ $usuario->NOM_USUARIO }}</span><br>
                        <b>Estado de Usuario:</b><span class="badge badge-info">{{ $usuario->ESTADO_USUARIO }}</span><br>
                </div>
                <br>
            </div>
        </div>

    	<div class="formulario__grupo formulario__btn-guardar text-center">
                <a href="{{ route('list_users') }}" class="btn formulario__btn2">Volver Atras</a>
        </div>
        <br>
    </div>
@endsection