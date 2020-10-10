@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3 class="card-title"><b>Gestionar Roles</b></h3> 
                </div>
                <div class="col-md-1">
                    <a href="{{route('create_roles')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Rol</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Permisos</th>
                        <th>Modificar Rol</th>
                        <th>Eliminar Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <th >{{ $rol->id }}</th>
                            <td>{{ $rol->name }}</td>
                            <td>
                                @foreach ($rol->permissions as $permission)
                                    <span class="badge badge-info">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('edit_roles',$rol->id)}}" class="fas fa-edit fa-2x"></a>
                            </td>
                            <td>
                                <a href="{{route('destroy_roles',$rol->id)}}" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
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
  
    var r = confirm("Acepta elminar el Rol Seleccionado?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection
