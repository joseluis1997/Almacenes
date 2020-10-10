@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestionar Salidas</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_salidas')}}" class="btn btn-primary rounded-pill float-right"><b>Nueva Salida</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th>Numero Salida</th>
                        <th>Numero Pedido</th>
                        <th>Fecha Salida</th>
                        <th>Estado</th>
                        <th>Area Solicitante</th>
                        <th>Imprimir Salida</th>
                        <th>Eliminar Salida</th>
                    </tr>
                    </thead>
                      <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
  
    var r = confirm("Acepta elminar la Salida Seleccionada?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection
