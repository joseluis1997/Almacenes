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
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Nit</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Estado</th>
                                <th>Ver</th>
                                <th>Modificar</th>
                                <th>Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedores as $proveedor)
                                @if($proveedor->ESTADO_PROVEEDOR == 1)
                                    <tr>
                                        <td>{{ $proveedor->COD_PROVEEDOR }}</td>
                                        <td>{{ $proveedor->NOM_PROVEEDOR }}</td>
                                        <td>{{ $proveedor->NIT }}</td>
                                        <td>{{ $proveedor->DIR_PROVEEDOR }}</td>
                                        <td>{{ $proveedor->TELEF_PROVEEDOR }}</td>
                                        <td>
                                            @if($proveedor->ESTADO_PROVEEDOR)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                         <td>
                                            <a href="{{route('show_proveedor',$proveedor->COD_PROVEEDOR)}}" class="fas fa-eye fa-2x"></a>
                                         </td>
                                        <td>
                                            @can('Modificar_proveedores')
                                                <a href="{{ route ('edit_proveedor',$proveedor->COD_PROVEEDOR)}}" class="fas fa-edit fa-2x"></a>
                                            @endcan
                                        </td>
                                        <td> 
                                            <form action="{{route('destroy_proveedor', $proveedor->COD_PROVEEDOR)}}" onsubmit="submitForm(event, {{$proveedor->ESTADO_PROVEEDOR}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($proveedor->ESTADO_PROVEEDOR)
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
                {{-- data table unidades de proveedores desabilitado --}}
                <div class="tab-pane fade" id="nav-proveedor-bajas" role="tabpanel" aria-labelledby="nav-proveedor-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Nit</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Ver</th>
                                <th>Estado</th>
                                <th>Modificar</th>
                                <th>Habilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proveedores as $proveedor)
                                @if($proveedor->ESTADO_PROVEEDOR == 0)
                                    <tr>
                                        <td>{{ $proveedor->COD_PROVEEDOR }}</td>
                                        <td>{{ $proveedor->NOM_PROVEEDOR }}</td>
                                        <td>{{ $proveedor->NIT }}</td>
                                        <td>{{ $proveedor->DIR_PROVEEDOR }}</td>
                                        <td>{{ $proveedor->TELEF_PROVEEDOR }}</td>
                                        <td>
                                            @if($proveedor->ESTADO_PROVEEDOR)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                        <td>
                                            @can('modificar_usuarios')
                                                <a href="{{ route ('edit_proveedor',$proveedor->COD_PROVEEDOR)}}" class="fas fa-edit fa-2x"></a>
                                            @endcan
                                        </td>
                                        <td> 
                                            <form action="{{route('destroy_proveedor', $proveedor->COD_PROVEEDOR)}}" onsubmit="submitForm(event, {{$proveedor->ESTADO_PROVEEDOR}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($proveedor->ESTADO_PROVEEDOR)
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
    } );

    function submitForm(event, estado,form) { 
        event.preventDefault();
        var r = null;
        if(estado == 1){
          r = confirm("Acepta Desabilitar el Proveedor Seleccionado");
        }else{
          r = confirm("Acepta habilitar el Proveedor Seleccionado");
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
