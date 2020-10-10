@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestionar Consumo Directos</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_consumodirecto')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Consumo Directo</b></a><br/><br/>
                     <a href="{{route('create_consumodirecto')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Consumo Directo Automatico</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered " style="width:100%">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>fecha</th>
                        <th>Numero Preventivo</th>
                        <th>Numero Orden Compra</th>
                        <th>Unidad Solicitante</th>
                        <th>Imprimir</th>
                        <th>Modificar Consumo D.</th>
                        <th>Eliminar Consumo D.</th>
                    </tr>
                    </thead>
                      <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="#" class="fas fa-print fa-2x"></a>
                                </td>
                                <td>
                                    @can('modificar_usuarios')
                                    <a href="{{ route ('edit_consumodirecto')}}" class="fas fa-edit fa-2x"></a>
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
  
    var r = confirm("Acepta elminar el Consumo Directo Seleccionado?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection
