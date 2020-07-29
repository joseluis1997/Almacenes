@extends('layouts.app')

@section('contenido')
	 <div class="title">
        <h1>Registro Nueva Partida</h1>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_partidas')}}"  id="form-general" class="form-horizontal form--label-right" method="POST">
                @csrf
                
                @include('admin.partida.form')
                <div class="text-center">
                     <!-- @include('includes.boton-form-crear',['name'=>'Guardar','color'=>'primary']) -->
                     <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{route('list_partidas')}}" class="btn btn-outline-danger">Cancelar</a>                 
                </div>
            </form>
        </div>
    </div>

@endsection('contenido')