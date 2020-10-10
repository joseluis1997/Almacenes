@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3 class="card-title"><b>Gestionar Usuarios</b></h3> 
                </div>
                <div class="col-md-1">
                    <a href="{{route('create_users')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Usuario</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>telefono</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Modificar Area</th>
                        <th>Eliminar Area</th>
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
                                    <a href="{{route ('edit_user',$user->id)}}" class="fas fa-edit fa-2x"></a>
                                    @endcan
                                </td>
                                <td>
                                    @can ('eliminar_usuarios')
                                    <a href="{{route ('destroy_user',$user->id)}}" style="color:red;"class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table> 
        </div>
    </div>
</div>
  
@endsection('contenido')

@section('scripts')
    <script type="text/javascript">

  function eliminar(event) {
  
    var r = confirm("Acepta elminar el Area Seleccionado?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection
