@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Nuevo Usuario</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_users')}}"  id="formulario" class="formulario" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.usuarios.formularioCrearUsuario')
                           
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioUsuario.js') }}"></script>
    <script type="text/javascript">
        function abrir(){
            document.getElementById("vent").style.display="block";
        }

        function cerrar(){
            document.getElementById("vent").style.display="none";
        }
    </script>
@endsection

