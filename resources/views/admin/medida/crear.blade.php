@extends('layouts.app')

@section('contenido')
	 <div class="title">
        <h3><b>Nueva Unidad de Medida</b></h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_medidas')}}"  id="form-general" class="form-horizontal form--label-right" method="POST">
                @csrf
                @include('admin.medida.form')
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_medidas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Guardar</button>
                </div>
            </form>
        </div>
    </div>

@endsection('contenido')