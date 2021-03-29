@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-7">
                    <h3 class="card-title"><b>Gestion Compras</b></h3> 
                </div>
                <div class="col-md-5">
                    <a href="{{route('create_almacen')}}" class="btn btn-primary rounded-pill float-right"><b>Nueva Compra</b></a>
                </div>
            </div>
        </div>
        <div class="card-body">    
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-stockAlamacen-activos-tab" data-toggle="tab" href="#nav-stockAlamacen-activos" role="tab" aria-controls="nav-stockAlamacen-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-stockAlamacen-bajas-tab" data-toggle="tab" href="#nav-stockAlamacen-bajas" role="tab" aria-controls="nav-stockAlamacen-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav> 
            <div class="tab-content" id="nav-tabContent">
                {{-- data table pedidos habilitados --}}
                <div class="tab-pane fade show active" id="nav-stockAlamacen-activos" role="tabpanel" aria-labelledby=" nav-stockAlamacen-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Orden Compra</th>
                                <th>Preventivo</th>
                                <th>Area Solicitante</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Ver Detalle</th>
                                <th>Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                                @if($compra->ESTADO_COMPRA == 1 )
                                    <tr>
                                        {{-- <td>{{ $compra->COD_COMPRA_STOCK }}</td> --}}
                                        <td>{{ $compra->FECHA }}</td>
                                        <td>{{ $compra->NRO_ORD_COMPRA }}</td>
                                        <td>{{ $compra->NRO_PREVENTIVO }}</td>
                                        <td>{{ $compra->Area->NOM_AREA}}</td>
                                        <td>{{ $compra->total }}bs</td>
                                        <td>
                                            @if($compra->ESTADO_COMPRA)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('show_almacen',$compra->COD_COMPRA_STOCK)}}" ><button class="btn btn-primary">Detalles</button></a>
                                        </td>

                                        <td> 
                                            <form action="{{route('destroy_almacen', $compra->COD_COMPRA_STOCK)}}" onsubmit="submitForm(event, {{$compra->ESTADO_COMPRA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($compra->ESTADO_COMPRA)
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
                {{-- data table pedidos desabilitado --}}
                <div class="tab-pane fade" id="nav-stockAlamacen-bajas" role="tabpanel" aria-labelledby="nav-stockAlamacen-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Orden Compra</th>
                                <th>Preventivo</th>
                                <th>Area Solicitante</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Ver Detalle</th>
                                <th>Habilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compras as $compra)
                                @if($compra->ESTADO_COMPRA == 0)
                                    <tr>
                                        {{-- <td>{{ $compra->COD_COMPRA_STOCK }}</td> --}}
                                        <td>{{ $compra->FECHA }}</td>
                                        <td>{{ $compra->NRO_ORD_COMPRA }}</td>
                                        <td>{{ $compra->NRO_PREVENTIVO }}</td>
                                        <td>{{ $compra->Area->NOM_AREA}}</td>
                                        <td>{{ $compra->total }}bs</td>
                                        <td>
                                            @if($compra->ESTADO_COMPRA)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                         <td>
                                            <a href="{{route('show_almacen',$compra->COD_COMPRA_STOCK)}}" ><button class="btn btn-primary">Detalles</button></a>
                                        </td>

                                        <td> 
                                            <form action="{{route('destroy_almacen', $compra->COD_COMPRA_STOCK)}}" onsubmit="submitForm(event, {{$compra->ESTADO_COMPRA}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($compra->ESTADO_COMPRA)
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
              r = confirm("Acepta Desabilitar la compra Stock Seleccionado");
            }else{
              r = confirm("Acepta habilitar la compra Stock Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

        function eliminar(event) {
            var r = confirm("Acepta elminar el Stock Almacen Seleccionado?");
            if (r == true) {
            } 
            else {
                 event.preventDefault();
             }
        }
    </script>
@endsection
