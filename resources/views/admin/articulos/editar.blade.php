@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                         @endif
                        <h3 class="card-title"><b>Modificar Articulo</b></h3> 
                    </div>
                </div>
            </div>

            <div class="card-body">    
                <form action="{{route('update_articulos', ['articulo' => $articulo->COD_ARTICULO])}}"  class="formulario" method="POST" id="formulario">
                    @csrf @method("put")

                    @include('admin.articulos.formEditar')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioArticulo.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection