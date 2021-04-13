@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3 class="card-title"><b>Reporte Inventario Actual</b></h3> 
                    </div>
                </div>

            </div>

            <div class="card mt-2">
                <div class="card-body">
                <form  action="{{route('create_report_InventarioActual')}}"  id="formulario" class="" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    @include('admin.ReporteInventarioActual.form')
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
