@extends('layouts.app')


@section('contenido')
    <div class="title">
        <h1>Crear role</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form class="form-validation" method="POST" action="{{ route('store_roles') }}" novalidate>
                {{ csrf_field() }}
                @include('admin.roles.form')

                <div class="text-center mb-4">
                    <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{ route('list_roles') }}" class="btn btn-outline-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    
@endsection