@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-11">
                        <h3 class="card-title"><b>Reporte de Resumen Fisico Valorado Stock De Almacen</b></h3> 
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
            <form  action="{{route('create_report_FisicoValoradoStockAlmacen')}}"  id="formulario" class="" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.ResumenFisicoValoradoStockAlmacen.form')
              
            </form>
            </div>
        </div>
    </div>
@endsection