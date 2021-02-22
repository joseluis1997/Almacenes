@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="card-title"><b>Gestion Salidas</b></h3> 
                </div>
                <div class="col-md-2">
                    <a href="{{route('create_salidas')}}" class="btn btn-primary rounded-pill float-right"><b>Nueva Salida</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">   
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-salida-activos-tab" data-toggle="tab" href="#nav-salida-activos" role="tab" aria-controls="nav-salida-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-salida-bajas-tab" data-toggle="tab" href="#nav-salida-bajas" role="tab" aria-controls="nav-salida-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav>  
            <div class="tab-content" id="nav-tabContent">
                {{-- data table salida habilitados --}}
                <div class="tab-pane fade show active" id="nav-salida-activos" role="tabpanel" aria-labelledby="nav-salida-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Pedido</th>
                                <th>Fecha</th>
                                <th>Area Solicitante</th>
                                <th>Estado</th>
                                <th>Modificar Salida</th>
                                <th>Imprimir Salida</th>
                                <th>Deshabilitar Salida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Salidas as $salida)
                                @if($salida->ESTADO_SALIDA==1)
                                    <tr>
                                        <td>{{$salida->COD_SALIDA}}</td>
                                        <td>{{$salida->COD_PEDIDO}}</td>
                                        <td>{{$salida->FECHA}}</td>
                                        <td>{{$salida->area->NOM_AREA}}</td>
                                        <td>
                                            @if($salida->ESTADO_SALIDA)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                        <td>
                                          @can('modificar_articulos')
                                            <a href="{{route ('edit_salidas',$salida->COD_SALIDA)}}" class="fas fa-edit fa-2x"></a>
                                          @endcan
                                        </td>
                                        <td>Imprimir</td>
                                        <td> 
                                            <form action="{{ route('destroy_salidas', $salida->COD_SALIDA) }}" onsubmit="submitForm(event, {{ $salida->ESTADO_SALIDA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($salida->ESTADO_SALIDA)
                                                  <button type="submit" class="btn-sm btn btn-outline-danger w-60">
                                                    Deshabilitar
                                                  </button>
                                                @else
                                                  <button type="submit" class="btn-sm btn btn-outline-primary w-60">
                                                    Habilitar
                                                  </button>

                                                @endif
                                            </form>
                                        </td>
                                        
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
        });

        function submitForm(event, estado,form) { 
            event.preventDefault();
            var r = null;
            if(estado == 1){
              r = confirm("Acepta Desabilitar el pedido Seleccionado");
            }else{
              r = confirm("Acepta habilitar el pedido Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

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
