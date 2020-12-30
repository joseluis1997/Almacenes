@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-title"><b>Modificar Articulo</b></h3> 
                    </div>
                </div>
            </div>

            <div class="card-body">    
                <form action="{{route('update_articulos', ['articulo' => $articulo->COD_ARTICULO])}}" id="form-general" class="formulario" method="POST" >
                    @csrf @method("put")

                    @include('admin.articulos.formEditar')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioUsuario.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection