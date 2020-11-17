@extends('layouts.app')


@section('contenido')
    <div class="title">
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
                </div>
            </form>
            {{-- {{!! dd( old() ) !!}} --}}
        </div>
    </div>
    
@endsection

@section('scripts')
<script src="{{ asset('js/ValidarformularioRol.js') }}"></script>
@endsection