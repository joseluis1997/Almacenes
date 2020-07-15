@extends('layouts.app')


@section('contenido')
    
<div class="container-fluid">
    <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20">
                    <h4 class="c-grey-900 mB-20 d-inline">Lista de roles</h4>
                    <a href="{{route('create_roles')}}" class="btn btn-outline-primary rounded-pill float-right">Crear Nuevo</a>
                    <div class="table-responsive-xl">
                        <table class="table table-hover table-sm mt-2">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Permisos</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $rol->name }}</td>
                                        <td>
                                            @foreach ($rol->permissions as $permission)
                                                <span class="badge badge-info">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{route('edit_roles',$rol->id)}}" class="btn btn-outline-success rounded-pill">Editar</a>
                                            <a href="{{route('destroy_roles',$rol->id)}}" class="btn btn-outline-danger rounded-pill" onclick="eliminar(event);">Eliminar</a>
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
  
  var r = confirm("Acepta elminar el Rol Seleccionado?");
  if (r == true) {

  } else {
    event.preventDefault();
  }
  
}
</script>
@endsection