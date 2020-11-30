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
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-proveedor-activos-tab" data-toggle="tab" href="#nav-proveedor-activos" role="tab" aria-controls="nav-proveedor-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-proveedor-bajas-tab" data-toggle="tab" href="#nav-proveedor-bajas" role="tab" aria-controls="nav-proveedor-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table unidades de proveedores habilitados --}}
                <div class="tab-pane fade show active" id="nav-proveedor-activos" role="tabpanel" aria-labelledby=" nav-proveedor-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
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
                            {{-- @foreach($ as $)
                                @if($) --}}
                                    <tr>
                                        <td>hola</td>
                                        <td>hola</td>
                                        <td>hola</td>
                                        <td>
                                            @can('modificar_usuarios')
                                                <a href="{{ route ('edit_proveedor')}}" class="fas fa-edit fa-2x"></a>
                                                    @endcan
                                        </td>
                                        <td>
                                            @can ('eliminar_usuarios')
                                            <a href="#" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                                    @endcan
                                        </td>
                                     </tr>
                            {{--     @endif
                            @endforeach --}}
                        </tbody>
                    </table> 
                </div>
                {{-- data table unidades de proveedores desabilitado --}}
                <div class="tab-pane fade" id="nav-proveedor-bajas" role="tabpanel" aria-labelledby="nav-proveedor-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
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
                                <td>hola</td>
                                <td>hola</td>
                                <td>hola</td>
                                <td>
                                    @can('modificar_usuarios')
                                        <a href="{{ route ('edit_proveedor')}}" class="fas fa-edit fa-2x"></a>
                                            @endcan
                                </td>
                                <td>
                                    @can ('eliminar_usuarios')
                                    <a href="#" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                            @endcan
                                </td>
                             </tr>
                        </tbody>
                    </table> 
                </div>
            </div>   
        </div>
    </div>
</div>
  
@endsection('contenido')

@section('scripts')
    <script type="text/javascript">

    $(document).ready(function() {
        $('#dataAltas').dataTable( {
            "scrollCollapse":true,
            "language": {
                "url": "/jsons/Spanish.json"
            },
        });
        $('#dataBajas').dataTable( {
            "scrollCollapse":true,
            "language": {
                "url": "/jsons/Spanish.json"
            },
        });
    } );

    function submitForm(event, estado,form) { 
        event.preventDefault();
        var r = null;
        if(estado == 1){
          r = confirm("Acepta Desabilitar la partida Seleccionada");
        }else{
          r = confirm("Acepta habilitar la partida Seleccionada");
        }
        if (r == true) {
          form.submit();
        }
    }

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
