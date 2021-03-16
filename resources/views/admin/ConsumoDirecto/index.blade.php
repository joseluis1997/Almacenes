@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestion Consumo Directos</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_consumodirecto')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Consumo Directo</b></a><br/><br/>
                </div>
            </div>
        </div>
        <div class="card-body">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-consumoD-activos-tab" data-toggle="tab" href="#nav-consumoD-activos" role="tab" aria-controls="nav-consumoD-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-consumoD-bajas-tab" data-toggle="tab" href="#nav-consumoD-bajas" role="tab" aria-controls="nav-consumoD-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table unidades de medidas habilitados --}}
                <div class="tab-pane fade show active" id="nav-consumoD-activos" role="tabpanel" aria-labelledby=" nav-consumoD-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>fecha</th>
                            <th>Numero Preventivo</th>
                            <th>Numero Orden Compra</th>
                            <th>Unidad Solicitante</th>
                            <th>Modificar</th>
                            <th>Ver Detalles</th>
                            <th>Deshabilitar</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ConsumoDirecto as $Consumo)
                                @if($Consumo->ESTADO_COMPRA == 1)
                                    <tr>
                                        <td>{{ $Consumo->COD_CONSUMO_DIRECTO }}</td>
                                        <td>{{ $Consumo->FECHA }}</td>
                                        <td>{{ $Consumo->NRO_PREVENTIVO }}</td>
                                        <td>{{ $Consumo->NRO_ORD_COMPRA }}</td>
                                        <td>{{ $Consumo->Area->NOM_AREA }}</td>
                                        @can('Modificar_consumos_directos')
                                            <td>
                                                <a href="{{ route ('edit_consumodirecto', $Consumo->COD_CONSUMO_DIRECTO)}}" class="fas fa-edit fa-2x"></a>
                                            </td>
                                        @endcan
                                        @can('VerDetalles_consumos_directos')
                                            <td>
                                                <a href="{{ route('show_consumoD',$Consumo->COD_CONSUMO_DIRECTO) }}" ><button class="btn btn-primary">Ver Detalles</button></a>
                                            </td>
                                        @endcan
                                        <td> 
                                            <form action="{{route('destroy_consumodirecto', $Consumo->COD_CONSUMO_DIRECTO)}}" onsubmit="submitForm(event, {{$Consumo->ESTADO_COMPRA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                    <button type="submit" class="btn-sm btn btn-outline-danger w-60">
                                                        Deshabilitar
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table> 
                    </div>
                    {{-- data table unidades de medidas desabilitado --}}
                <div class="tab-pane fade" id="nav-consumoD-bajas" role="tabpanel" aria-labelledby="nav-consumoD-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>fecha</th>
                            <th>Numero Preventivo</th>
                            <th>Numero Orden Compra</th>
                            <th>Unidad Solicitante</th>
                            <th>Modificar</th>
                            <th>Ver Detalles</th>
                            <th>Habilitar</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($ConsumoDirecto as $Consumo)
                                @if($Consumo->ESTADO_COMPRA == 0)
                                    <tr>
                                        <td>{{ $Consumo->COD_CONSUMO_DIRECTO }}</td>
                                        <td>{{ $Consumo->FECHA }}</td>
                                        <td>{{ $Consumo->NRO_PREVENTIVO }}</td>
                                        <td>{{ $Consumo->NRO_ORD_COMPRA }}</td>
                                        <td>{{ $Consumo->Area->NOM_AREA }}</td>
                                        <td>
                                            <a href="#" class="fas fa-print fa-2x"></a>
                                        </td>
                                        <td>
                                            @can('modificar_usuarios')
                                            <a href="{{ route ('edit_consumodirecto', $Consumo->COD_CONSUMO_DIRECTO)}}" class="fas fa-edit fa-2x"></a>
                                            @endcan
                                        </td>
                                        <td> 
                                            <form action="{{route('destroy_consumodirecto', $Consumo->COD_CONSUMO_DIRECTO)}}" onsubmit="submitForm(event, {{$Consumo->ESTADO_COMPRA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            
                                                    <button type="submit" class="btn-sm btn btn-outline-primary w-60">
                                                        Habilitar
                                                    </button>

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
              r = confirm("Acepta Desabilitar el Consumo Directo Seleccionado");
            }else{
              r = confirm("Acepta habilitar el Consumo Directo Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

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
