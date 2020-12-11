@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3 class="card-title"><b>Gestion Roles</b></h3> 
                </div>
                <div class="col-md-1">
                    <a href="{{route('create_roles')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Rol</b></a>
                </div>
            </div>
        </div>
        <div class="card-body"> 
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-rol-activos-tab" data-toggle="tab" href="#nav-rol-activos" role="tab" aria-controls="nav-rol-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-rol-bajas-tab" data-toggle="tab" href="#nav-rol-bajas" role="tab" aria-controls="nav-rol-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav>   
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-rol-activos" role="tabpanel" aria-labelledby=" nav-rol-activos-tab" style="padding-top: 15px;">
                <table id="dataAltas" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Permisos</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Modificar Rol</th>
                            <th>Eliminar Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            @if($rol->estado == 1)
                                <tr>
                                    <td>{{ $rol->name }}</td>
                                    <td>
                                        @foreach ($rol->permissions as $permission)
                                            <span class="badge badge-info">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($rol->estado)
                                            <button type="button" class="btn bottA navbar-btn">Activo</button>
                                        @else
                                             <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('show_role',$rol->id)}}" class="fas fa-eye fa-2x"></a>
                                    </td>
                                    <td>
                                        <a href="{{route('edit_roles',$rol->id)}}" class="fas fa-edit fa-2x"></a>
                                    </td>
                                    <td> 
                                        <form action="{{route('destroy_role', $rol->id)}}" onsubmit="submitForm(event, {{$rol->estado}}, this)" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            @if($rol->estado)
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
                <div class="tab-pane fade" id="nav-rol-bajas" role="tabpanel" aria-labelledby="nav-rol-bajas-tab" style="padding-top: 15px">
                    <table id="dataBajas" class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Permisos</th>
                                <th>Estado</th>
                                <th>Ver</th>
                                <th>Modificar Rol</th>
                                <th>Eliminar Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                                @if($rol->estado == 0)
                                    <tr>
                                        <td>{{ $rol->name }}</td>
                                        <td>
                                            @foreach ($rol->permissions as $permission)
                                                <span class="badge badge-info">{{ $permission->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($rol->estado)
                                                <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                            @else
                                                 <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('show_role',$rol->id)}}" class="fas fa-eye fa-2x"></a>
                                        </td>
                                        <td>
                                            <a href="{{route('edit_roles',$rol->id)}}" class="fas fa-edit fa-2x"></a>
                                        </td>
                                        <td> 
                                            <form action="{{route('destroy_role', $rol->id)}}" onsubmit="submitForm(event, {{$rol->estado}}, this)" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                @if($rol->estado)
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
              r = confirm("Acepta Desabilitar el Rol Seleccionado");
            }else{
              r = confirm("Acepta habilitar el Rol Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
         }

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
