@extends('layouts.app')

@section('contenido')

    <div class="title">
        <h3><b>Modificar Rol</b></h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form class="form-validation" method="POST"  action="{{ route('update_roles', $role->id) }}" novalidate>  
                 @method("put")
                {{ csrf_field() }}

                @include('admin.roles.formEdit')
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{ route('list_roles') }}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
            </form>
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
