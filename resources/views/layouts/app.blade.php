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
        <link href="{{ asset('css/formulario.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
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
            <div class="SIDEBAR">
                <div class="SIDEBAR-MENU">
                    <center class="PROFILE">

                        <img src="/images/users/{{  Auth::user()->imagen }}" alt="">

                        <p>{{ Auth::user()->name}}<br/>Bienvenido a Sigadet @role('super-admin') Bienvenido Administrador @endrole
                         @role('moderador') 'Bienvenido Moderador' @endrole </p>
                    </center>
                    <li class="ITEM">
                        <a href="#" class="MENU-BTN">
                            <i class="fas fa-desktop"></i><span>MENU</span>
                        </a>
                    </li>
                    {{-- Gestionar Usuarios --}}
                    @canany(['accesso_usuarios','crear_usuarios','modificar_usuarios','eliminar_usuarios'])
                      <li class="ITEM">
                        <a href="{{route ('list_users')}}" class="MENU-BTN">
                            <i class="fas fa-users"></i><span>Gestionar Usuarios</span>
                        </a>
                      </li>
                    @endcan
                    {{-- Gestionar Roles --}}
                    <li class="ITEM">
                        <a href="{{route ('list_roles')}}" class="MENU-BTN">
                            <i class="fas fa-fist-raised"></i><span>Gestionar Roles</span>
                        </a>
                    </li>
                    {{-- Gestionar Articulos --}}
                    <li class="ITEM">
                        <a href="{{route ('list_articulos')}}" class="MENU-BTN">
                            <i class="fas fa-box-open"></i><span>Gestionar Articulos</span>
                        </a>
                    </li>
                    {{-- Gestionar Unidad de Medida --}}
                    <li class="ITEM">
                        <a href="{{route ('list_medidas')}}" class="MENU-BTN">
                            <i class="fas fa-ruler-vertical"></i><span>Gestionar Unidad de Medida</span>
                        </a>
                    </li>
                    {{-- Gestionar Partidas --}}
                    <li class="ITEM">
                        <a href="{{route ('list_partidas')}}" class="MENU-BTN">
                            <i class="fas fa-book-open"></i><span>Gestionar Partidas</span>
                        </a>
                    </li>
                    {{-- Gestionar Areas --}}
                    <li class="ITEM">
                        <a href="{{ route ('list_areas') }}" class="MENU-BTN">
                            <i class="fas fa-chart-area"></i><span>Gestionar Areas</span>
                        </a>
                    </li>
                    {{-- Gestionar Proveedores --}}
                     <li class="ITEM">
                        <a href="{{ route ('list_proveedores') }}" class="MENU-BTN">
                            <i class="fas fa-users"></i><span>Gestionar Proveedores</span>
                        </a>
                    </li>
                    {{-- Gestionar Cierre Sesion --}}
                     <li class="ITEM">
                        <a href="{{ route('list_cierregestion') }}" class="MENU-BTN">
                            <i class="fas fa-power-off"></i><span>Gestionar Cierre Gestion</span>
                        </a>
                    </li>
                    {{-- Gestionar Stock Alamacen --}}
                     <li class="ITEM">
                        <a href="{{ route('list_almacen') }}" class="MENU-BTN">
                            <i class="fas fa-warehouse"></i><span>Gestionar Stock Almacen</span>
                        </a>
                    </li>
                    {{-- Gestionar Consumo Directo --}}
                     <li class="ITEM">
                        <a href="{{ route('list_consumodirecto') }}" class="MENU-BTN">
                            <i class="fas fa-copyright"></i><span>Gestionar Consumo Directo</span>
                        </a>
                    </li>
                    {{-- Gestionar Pedidos --}}
                     <li class="ITEM">
                        <a href="{{ route('list_pedidos') }}" class="MENU-BTN">
                            <i class="fas fa-biking"></i><span>Gestionar Pedidos</span>
                        </a>
                    </li>
                    {{-- Gestionar Salidas --}}
                     <li class="ITEM">
                        <a href="{{ route('list_salidas') }}" class="MENU-BTN">
                            <i class="fas fa-plane-departure"></i><span>Gestionar Salidas</span>
                        </a>
                    </li>
                    {{-- Gestionar Reportes --}}
                     <li class="ITEM">
                        <a href="{{ route('list_reportes') }}" class="MENU-BTN">
                            <i class="fas fa-file-pdf"></i><span>Gestionar Reportes</span>
                        </a>
                    </li>
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
    $(document).ready(function() {
        $('#example').dataTable( {
             "scrollY": "350px",
             "scrollX": "350px",
             "scrollCollapse":true,
             "language": idioma
        } );
    } );
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
</script>
<script src="{{ asset('js/formulario.js') }}"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<!--  -->
</body>
@yield('scripts')


</html>
