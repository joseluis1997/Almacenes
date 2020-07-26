@extends('layouts.app')

@section('contenido')
	 <div class="title">
        <h1>Registro Nueva Unidad de Medida</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_medidas')}}"  id="form-general" class="form-horizontal form--label-right" method="POST">
                @csrf
                
                @include('admin.medida.form')
                <div class="text-center">
                     <!-- @include('includes.boton-form-crear',['name'=>'Guardar','color'=>'primary']) -->
                     <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{route('list_medidas')}}" class="btn btn-outline-danger">Cancelar</a>                 
                </div>
            </form>
        </div>
    </div>

@endsection('contenido')