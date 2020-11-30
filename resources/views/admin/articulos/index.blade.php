@extends('layouts.app')

@section('contenido')
    <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title"><b>Gestionar Articulos</b></h3> 
                </div>
                <div class="col-md-2">
                    <a href="{{route('create_articulos')}}" class="btn btn-primary">Nuevo Articulo</a>
                </div>
            </div>
        </div>
        <div class="card-body">   
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-articulo-activos-tab" data-toggle="tab" href="#nav-articulo-activos" role="tab" aria-controls="nav-articulo-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                    <a class="nav-item nav-link" id="nav-articulo-bajas-tab" data-toggle="tab" href="#nav-articulo-bajas" role="tab" aria-controls="nav-articulo-bajas" aria-selected="false">Bajas</a>
                </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table unidades de medidas habilitados --}}
                <div class="tab-pane fade show active" id="nav-articulo-activos" role="tabpanel" aria-labelledby=" nav-articulo-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>Item</th>
                               <th>Nombre</th>
                               <th>Ubicacion</th>
                               <th>Cantidad Actual</th>
                               {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($articulos as $articulo)
                                @if($articulo->ESTADO_ARTICULO == 1 )
                                    <tr>
                                        <td>{{ $articulo->COD_ARTICULO }}</td>
                                        <td>{{ $articulo->ITEM }}</td>
                                        <td>{{ $articulo->NOM_ARTICULO }}</td>
                                        <td>{{ $articulo->UBICACION }}</td>
                                        <td>{{ $articulo->CANT_ACTUAL }}</td>
                                    </tr>
                                @endif
                           @endforeach     
                        </tbody>
                    </table> 
                </div>
                {{-- data table unidades de medidas desabilitado --}}
                <div class="tab-pane fade" id="nav-articulo-bajas" role="tabpanel" aria-labelledby="nav-articulo-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                               <th>#</th>
                               <th>Item</th>
                               <th>Nombre</th>
                               <th>Ubicacion</th>
                               <th>Cantidad Actual</th>
                               {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $articulo)
                                @if($articulo->ESTADO_ARTICULO == 0 )
                                    <tr>
                                        <td>{{ $articulo->COD_ARTICULO }}</td>
                                        <td>{{ $articulo->ITEM }}</td>
                                        <td>{{ $articulo->NOM_ARTICULO }}</td>
                                        <td>{{ $articulo->UBICACION }}</td>
                                        <td>{{ $articulo->CANT_ACTUAL }}</td>
                                    </tr>
                                @endif
                           @endforeach     
                        </tbody>
                    </table> 
                </div>
            </div> 
        </div>
    </div>
</div>

@endsection

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
          r = confirm("Acepta Desabilitar el Articulo Seleccionado");
        }else{
          r = confirm("Acepta habilitar el Articulo Seleccionado");
        }
        if (r == true) {
          form.submit();
        }
    }


   function eliminar(event) {
        var r = confirm("Acepta elminar el Articulo Seleccionado?");
        if (r == true) {

        } 
        else{
             event.preventDefault();
        }
    }
    </script>
@endsection