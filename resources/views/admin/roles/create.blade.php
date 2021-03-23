@extends('layouts.app')


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
        <h3><b>Nuevo Rol</b></h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form class="form-validation" method="POST" action="{{ route('store_roles') }}" novalidate id="formulario" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.roles.formCreate')
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_roles')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Guardar</button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Datos Enviados</p>
                </div>
            </form>
            {{-- {{!! dd( old() ) !!}} --}}
        </div>
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioRol.js') }}">

        
    </script>
    <script>
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
    </script>

@endsection