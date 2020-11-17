@extends('layouts.app')

@section('contenido')
	  
<div class="container">
    <div class="card">

        <div class="card-header">
            <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Gestionar Articulos</h3> 
            </div>
            <div class="col-md-6" style="text-align:right;">
                <a href="{{route('create_articulos')}}" class="btn btn-primary">Crear Nuevo Articulo</a>
            </div>
            </div>
        </div>

        <div class="card-body">    
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Nombre</th>
                        <th>Ubicacion</th>
                        <th>Cantidad Actual</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                    <tbody>
                       @foreach($articulos as $articulo)
                            <td>{{ $articulo->COD_ARTICULO }}</td>
                            <td>{{ $articulo->ITEM }}</td>
                            <td>{{ $articulo->NOM_ARTICULO }}</td>
                            <td>{{ $articulo->UBICACION }}</td>
                            <td>{{ $articulo->CANT_ACTUAL }}</td>
                       @endforeach     
                              
                    </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection