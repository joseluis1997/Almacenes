@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title"><b>Gestionar Proveedores</b></h3> 
                </div>
                <div class="col-md-2">
                    <a href="{{route('create_proveedor')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Proveedor</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th>Identificador</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Modificar Area</th>
                        <th>Eliminar Area</th>
                    </tr>
                    </thead>
                      <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    @can('modificar_usuarios')
                                    <a href="{{ route ('edit_proveedor')}}" class="fas fa-edit fa-2x"></a>
                                    @endcan
                                </td>
                                <td>@can ('eliminar_usuarios')
                                    <a href="#" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                    @endcan
                                </td>
                            </tr>
                    </tbody>
            </table> 
        </div>
    </div>
</div>
  
@endsection('contenido')

@section('scripts')
    <script type="text/javascript">

  function eliminar(event) {
  
    var r = confirm("Acepta elminar el Proveedor Seleccionado?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection
