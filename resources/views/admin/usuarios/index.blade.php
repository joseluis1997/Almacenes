@extends('layouts.app')

@section('contenido')
    
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20">
                    <h4 class="c-grey-900 mB-20 d-inline">Lista de Usuarios</h4>
                    <a href="{{route('create_users')}}" class="btn btn-outline-primary rounded-pill float-right">Registro Nuevo Usuario</a>
                    <div class="table-responsive-xl">
                        <table class="table table-hover table-sm mt-2">
                            <thead class="table-primary">
                                <tr>
                                   <th>Cedula</th>
                                   <th>Nombre</th>
                                   <th>Apellidos</th>
                                   <th>telefono</th>
                                   <th>Usuario</th>
                                   <th>Rol</th>
                                   <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($datas as $user)
            									<tr>
            										<td>{{ $user->ci}}</td>
            										<td>{{ $user->name}}</td>
            										<td>{{ $user->lastname}}</td>
            										<td>{{ $user->telephone}}</td>
            										<td>{{ $user->username}}</td>
            										<td>{{implode(" ", $user->getRoleNames()->toArray())}}</td> 
            										<!-- con esta nuevo sacamos los array pero con implode separamos los array -->
            										 <!--#igual sacmos los roles {{$user->roles->implode('name', ' ,')}}-->
            			    						<td>
            			    							@can('modificar_usuarios')
            			    							<a href="{{route ('edit_user',$user->id)}}" class="btn btn-outline-success rounded-pill">Editar</a>
            			    							@endcan
            			    							@can ('eliminar_usuarios')
            			    							<a href="{{route ('destroy_user',$user->id)}}" class="btn btn-outline-danger rounded-pill" onclick="eliminar(event);">Eliminar</a>
            			    							@endcan
            			    						</td>
            									</tr>
                            	@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
<div>
@endsection
@section('scripts')
<script>

function eliminar(event) {
  
  var r = confirm("Acepta elminar el Usuario Seleccionado?");
  if (r == true) {

  } else {
  	event.preventDefault();
  }
  
}
</script>
@endsection