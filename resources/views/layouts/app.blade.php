<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <TITLE>Sigadet</TITLE>

        <!-- bootstrap datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('css/formulario.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

       {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> --}}

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta/dist/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta/dist/js/bootstrap-select.min.js"></script>




    </head>
    <body>

        <!--WRAPPER start-->
        <div class="WRAPPER">
            <!--HEADER MENU start-->
            <div class="HEADER">
                <div class="HEADER-MENU">
                    <div class="TITLE">Almacenes <span> Sigadet</span></div>
                    <div class="SIDEBAR-BTN">
                        <i class="fas fa-bars"></i>
                    </div>
                    <ul>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-power-off">
                        </i>
                        </a>
                        <b>Cerrar Sesion</b>
                    </li>
                        <form id="logout-form" action="{{ route('logout') }}" style="display: none;"> @csrf
                        </form>
                    </ul>
                </div>
            </div>
            <!--HEADER MENU end-->
            <!--SIDEBAR start SIDEBAR-->
            <div class="SIDEBAR  fondoDT">
                <div class="SIDEBAR-MENU">
                    <center class="PROFILE">

                        <img src="/images/users/{{  Auth::user()->imagen }}" alt="">

                        <p>{{ Auth::user()->name}}<br/>Bienvenido a Sigadet @role('super-admin') Bienvenido Administrador @endrole
                         @role('moderador') 'Bienvenido Moderador' @endrole </p>
                    </center>
                  {{--   <li class="ITEM">
                        <a href="#" class="MENU-BTN">
                            <i class="fas fa-ellipsis-h"></i><span>Menu</span>
                        </a>
                    </li> --}}

                    <nav class="navv MENU-BTN ">
                        {{-- Grupo: Administracion del Sistema --}}
                        @canany(['Listar_usuarios','Listar_roles'])
                            <label for="touch" class="">
                                 <i class="fas fa-desktop spann"><span class="padre">Administracion del Sistema</span></i>
                            </label>           
                            <input type="checkbox" id="touch"> 
                            <ul class="slide menusito" data-animation="center">
                                {{-- Gestionar Usuarios --}}
                                    @can('Listar_usuarios')
                                        <a href="{{route ('list_users')}}" class="MENU-BTN ahrf">
                                            <li><i class="fas fa-users"></i><span class="spannn menusito">Gestion Usuarios</span> </li>
                                        </a>
                                    @endcan
                                {{-- Gestionar Roles --}}
                                    @can('Listar_roles')
                                    <a href="{{route ('list_roles')}}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-fist-raised"></i><span class="spannn menusito">Gestion Roles</span></li>
                                    </a>
                                    @endcan
                            </ul>
                        @endcan
                        {{-- Grupo:Articulos  --}}
                        <label for="touch1">
                             <i class="fas fa-box-open spann"><span >Articulos</span></i>
                        </label>           
                        <input type="checkbox" id="touch1"> 
                            <ul class="slide menusito" data-animation="center">
                                {{-- Gestionar Articulos --}}
                                    <a href="{{route ('list_articulos')}}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-box-open"></i><span class="spannn menusito">Gestion Articulos</span></li>
                                    </a>
                                {{-- Gestionar Unidad de Medida --}}
                                    <a href="{{route ('list_medidas')}}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-ruler-vertical"></i><span class="spannn menusito">Gestion Unidad de Medida</span></li>
                                    </a>
                                {{-- Gestionar Partidas --}}
                                    <a href="{{route ('list_partidas')}}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-book-open"></i><span class="spannn menusito">Gestion Partidas</span></li>
                                    </a>
                                {{-- Gestionar Proveedores --}}
                                    <a href="{{ route ('list_proveedores') }}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-users"></i><span class="spannn menusito">Gestion Proveedores</span></li>
                                    </a>
                            </ul>
                             {{-- Grupo: Consumos --}}
                        <label for="touch2">
                            <i class="fas fa-copyright spann"><span >Consumos</span></i>
                        </label>           
                        <input type="checkbox" id="touch2"> 
                            <ul class="slide menusito" data-animation="center">
                                {{-- Gestionar Areas --}}
                                    <a href="{{ route ('list_areas') }}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-chart-area"></i><span class="spannn menusito">Gestion Areas</span></li>
                                    </a>
                                {{-- Gestionar Consumo Directo --}}
                                    <a href="{{ route('list_consumodirecto') }}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-copyright"></i><span class="spannn menusito">Gestion Consumo Directo</span></li>
                                    </a>                                
                                {{-- Gestionar Pedidos --}}
                                    <a href="{{ route('list_pedidos') }}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-biking"></i><span class="spannn menusito">Gestion Pedidos</span></li>
                                    </a>
                                {{-- Gestionar Salidas --}}
                                    <a href="{{ route('list_salidas') }}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-plane-departure"></i><span class="spannn menusito">Gestion Salidas</span></li>
                                    </a>
                                {{-- Gestionar Stock Alamacen --}}
                                    <a href="{{ route('list_almacen') }}" class="MENU-BTN ahrf">
                                        <li><i class="fas fa-warehouse"></i><span class="spannn menusito">Gestion Compras</span></li>
                                    </a>
                            </ul>
                            {{-- Grupo: Administracion del Sistema --}}
                            <label for="touch3">
                                <i class="fas fa-desktop spann"><span >Reportes</span></i>
                            </label>           
                            <input type="checkbox" id="touch3"> 
                                <ul class="slide menusito" data-animation="center">
                                    {{-- Gestionar Reportes --}}
                                        <a href="{{ route('list_reportes') }}" class="MENU-BTN ahrf">
                                            <li><i class="fas fa-file-pdf"></i><span class="spannn menusito">Gestion Reportes</span> </li>
                                        </a>                               
                                </ul>
                    </nav> 
                    {{-- Gestionar Cierre Sesion --}}
                   {{--   <li class="ITEM">
                        <a href="{{ route('list_cierregestion') }}" class="MENU-BTN">
                            <i class="fas fa-power-off"></i><span>Gestionar Cierre Gestion</span>
                        </a>
                    </li> --}}
                </div>
            </div>
        
            <!--SIDEBAR end-->
            <!--main container start-->
            <div class="MAIN-CONTAINER">
                @if(session('message'))
                        

                <div class="alert alert-success alert-{{ session('message')[0] }}" role="alert">
                 {{ session('message')[1] }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                 </button>
                </div>
                @endif
                @yield('contenido')
            </div>
            <!--main container end-->
        </div>
        <!--WRAPPER end-->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".SIDEBAR-BTN").click(function(){
                $(".WRAPPER").toggleClass("COLLAPSE");
            });
         });
    </script>

<!-- scripts datatable -->

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
            var idioma = {
            "sProcessing":     "Procesando...",
            "sLengthMENU":     "Mostrar _menu_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        }
        
        $(document).ready(function() {
            // show the alert
            setTimeout(function() {
            $(".alert").alert('close');
         }, 3000);
        });
    </script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

</body>
    @yield('scripts')
</html>