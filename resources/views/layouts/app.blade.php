<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <TITLE>Sigadet</TITLE>

        <!-- bootstrap datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                        <img src="{{ asset('images/logo.jpeg') }}" alt="">
                        <p>{{ Auth::user()->name}}<br/>Bienvenido a Sigadet @role('super-admin') Bienvenido Administrador @endrole
                         @role('moderador') 'Bienvenido Moderador' @endrole </p>
                    </center>
                    <li class="ITEM">
                        <a href="#" class="MENU-BTN">
                            <i class="fas fa-desktop"></i><span>MENU</span>
                        </a>
                    </li>
                    @canany(['accesso_usuarios','crear_usuarios','modificar_usuarios','eliminar_usuarios'])
                    <li class="ITEM" id="users">
                       
                        <a href="{{route('list_users')}}" class="MENU-BTN">
                            <i class="fas fa-users"></i><span>Gestionar Usuarios<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        
                      <!--   <div class="SUB-MENU">
                            <a href="{{route('list_users')}}"><i class="fas fa-user"></i><span>Gestionar Usuarios</span></a>
                            <a href="{{route ('list_roles')}}"><i class="fas fa-user"></i><span>Roles</span></a>
                            <a href="{{route('list_users')}}"><i class="fas fa-user"></i><span>Modificar Usuario</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Eliminar Usuario</span></a> 
                            <a href="{{route('list_users')}}"><i class="fas fa-user"></i><span>Listar Usuarios</span></a>
                        </div> -->
                    </li>
                    @endcan

                     <li class="ITEM" id="roles">
                        <a href="{{route ('list_roles')}}" class="MENU-BTN">
                            <i class="fas fa-envelope"></i><span>Gestionar Rol<i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                       <!--  <div class="SUB-MENU">
                            <a href="#"><i class="fas fa-user"></i><span>Registrar Articulo</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Modificar Articulo</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Eliminar Articulo</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Listar Articulo del Almacen</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Bajo Stock</span></a>
                        </div> -->
                    </li>
                    <li class="ITEM" id="articulos">
                        <a href="{{route ('list_articulos')}}" class="MENU-BTN">
                            <i class="fas fa-envelope"></i><span>Gestionar Articulos <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                       <!--  <div class="SUB-MENU">
                            <a href="#"><i class="fas fa-user"></i><span>Registrar Articulo</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Modificar Articulo</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Eliminar Articulo</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Listar Articulo del Almacen</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Bajo Stock</span></a>
                        </div> -->
                    </li>
                    <li class="ITEM" id="MEDIDAS">
                        <a href="{{route ('list_medidas')}}" class="MENU-BTN">
                            <i class="fas fa-cog"></i><span>Gestionar Unidad de Medidas <i class="fas fa-chevron-down drop-down"></i></span>
                        </a>
                        <!-- <div class="SUB-MENU">
                            <a href="#"><i class="fas fa-user"></i><span>Registrar Unidad Medida</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Modificar Unidad Medida</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Eliminar Unidad Medida</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Listar Unidades de Medida</span></a>
                            <a href="#"><i class="fas fa-user"></i><span>Bajo Stock</span></a>                    
                        </div> -->
                    </li>

                     <li class="ITEM">
                        <a href="{{route ('list_partidas')}}" class="MENU-BTN">
                            <i class="fas fa-info-circle"></i><span>Gestionar Partidas</span>
                        </a>
                    </li>

                    <li class="ITEM">
                        <a href="#" class="MENU-BTN">
                            <i class="fas fa-info-circle"></i><span>About</span>
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
        $('#list').dataTable( {
             "scrollY": "350px",
             "scrollX": "350px",
             "scrollCollapse":true,
             "language": idioma
        } );
    } );
    var idioma = {
    "sProcessing":     "Procesando...",
    "sLengthMENU":     "Mostrar _MENU_ registros",
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

<!--  -->
</body>
@yield('scripts')


</html>
