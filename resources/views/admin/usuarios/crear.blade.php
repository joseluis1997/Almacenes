@extends("layouts.app")

@section('contenido')

    <div class="title">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>

                    @endforeach
                </ul>
            </div>
        @endif
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
        $(function () {
          $('[data-toggle="popover"]').popover()
        })

        $("#fileToUpload").change(function(){
        var imagen = $(this)[0].files[0];
          
          var reader  = new FileReader();
          reader.readAsDataURL(imagen);
          
          reader.onload = function(){
            var dataURL = reader.result;
            
            $("#preview").html('<img class="img img-fluid rounded-circle" src="'+ dataURL +'" width="300" height="300">');
          }
        });
    </script>
@endsection

