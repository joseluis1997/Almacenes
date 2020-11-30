@extends('layouts.app')

@section('contenido')
	 <div class="title">
        <h1>Registro Nuevo Articulo</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_articulos')}}"  id="form-general" class="form-horizontal form--label-right" method="POST">
                @csrf
                
                @include('admin.articulos.form')
                <div class="text-center">
                     <!-- @include('includes.boton-form-crear',['name'=>'Guardar','color'=>'primary']) -->
                     <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{route('list_articulos')}}" class="btn btn-outline-danger">Cancelar</a>                 
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
     
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection