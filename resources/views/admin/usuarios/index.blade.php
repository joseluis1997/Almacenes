@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card fondoDT">
        <div class="card-header">
            <div class="row">
                <div class="col-md-11">
                    <h3 class="card-title"><b>Gestionar Usuarios</b></h3> 
                </div>
                <div class="col-md-1">
                    <a href="{{route('create_users')}}" class="btn btn-primary rounded-pill float-right"><b>Nuevo Usuario</b></a>
                </div>
            </div>
        </div>
        <div class="card-body" >
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-user-activos-tab" data-toggle="tab" href="#nav-user-activos" role="tab" aria-controls="nav-user-activos" aria-selected="true" style="margin-left: 42%">Activos</a>
                <a class="nav-item nav-link" id="nav-user-bajas-tab" data-toggle="tab" href="#nav-user-bajas" role="tab" aria-controls="nav-user-bajas" aria-selected="false">Bajas</a>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-user-activos" role="tabpanel" aria-labelledby="nav-user-activos-tab" style="padding-top: 15px;">
                    <table id="dataAltas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>telefono</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $user)
                            @if($user->ESTADO_USUARIO == 1)
                            <tr>
                                <td>{{ $user->CI}}</td>
                                <td>{{ $user->NOM_USUARIO}}</td>
                                <td>{{ $user->APELLIDO}}</td>
                                <td>{{ $user->TELEFONO}}</td>
                                <td>{{ $user->NOM_USUARIO}}</td>
                                <td>{{implode(" ", $user->getRoleNames()->toArray())}}</td> 
                                <!-- con esta nuevo sacamos los array pero con implode separamos los array -->
                                 <!--#igual sacmos los roles {{$user->roles->implode('name', ' ,')}}-->
                                 <td>
                                        @if($user->ESTADO_USUARIO)
                                            <button type="button" class="btn btn-success navbar-btn ">Activo</button>
                                        @else
                                             <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                        @endif
                                </td>
                               <td>
                                <a href="{{route('show_usuario',$user->id)}}" class="fas fa-eye fa-2x circulo"></a>
                                </td>
                               <td>
                                    @can('modificar_usuarios')
                                    <a href="{{route ('edit_user',$user->id)}}" class="fas fa-edit fa-2x circulo"></a>
                                    @endcan
                                </td>
                                  <td> 
                                        <form action="{{route('destroy_user', $user->id)}}" onsubmit="submitForm(event, {{$user->ESTADO_USUARIO}}, this)" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            @if($user->ESTADO_USUARIO)
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
                               {{--  <td>
                                    @can ('eliminar_usuarios')
                                    <a href="{{route ('destroy_user',$user->id)}}" style="color:red;"class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                    @endcan
                                </td> --}}
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                    </table> 
              </div>
              <div class="tab-pane fade" id="nav-user-bajas" role="tabpanel" aria-labelledby="nav-user-bajas-tab" style="padding-top: 15px">
                  <table id="dataBajas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>telefono</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Ver</th>
                            <th>Modificar</th>
                            <th>Habilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $user)
                            @if($user->ESTADO_USUARIO == 0)
                            <tr>
                                <td>{{ $user->CI}}</td>
                                <td>{{ $user->NOM_USUARIO}}</td>
                                <td>{{ $user->APELLIDO}}</td>
                                <td>{{ $user->TELEFONO}}</td>
                                <td>{{ $user->NOM_USUARIO}}</td>
                                <td>{{implode(" ", $user->getRoleNames()->toArray())}}</td> 
                                <!-- con esta nuevo sacamos los array pero con implode separamos los array -->
                                 <!--#igual sacmos los roles {{$user->roles->implode('name', ' ,')}}-->
                                 <td>
                                        @if($user->ESTADO_USUARIO)
                                            <button type="button" class="btn btn-success navbar-btn">Activo</button>
                                        @else
                                             <button type="button" class="btn btn-danger navbar-btn">Inactivo</button>
                                        @endif
                                </td>
                               <td>
                                <a href="{{route('show_usuario',$user->id)}}" class="fas fa-eye fa-2x"></a>
                                </td>
                               <td>
                                    @can('modificar_usuarios')
                                    <a href="{{route ('edit_user',$user->id)}}" class="fas fa-edit fa-2x"></a>
                                    @endcan
                                </td>
                                  <td> 
                                        <form action="{{route('destroy_user', $user->id)}}" onsubmit="submitForm(event, {{$user->ESTADO_USUARIO}}, this)" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            @if($user->ESTADO_USUARIO)
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
              r = confirm("Acepta Desabilitar el Usuario Seleccionado");
            }else{
              r = confirm("Acepta habilitar el Usuario Seleccionado");
            }
            if (r == true) {
              form.submit();
            }
        }

        function eliminar(event) {
          
            var r = confirm("Acepta elminar el Area Seleccionado?");
            if (r == true) {

            } 
            else {
                 event.preventDefault();
             }
        }

    </script>
@endsection
