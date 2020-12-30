@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Modificar Partida</b></h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form action="{{route('update_partidas',$partida->COD_PARTIDA)}}" id="form-general" class="form-horizontal form--label-right" method="POST" >
             @csrf @method("put")
                    @include('admin.partida.formEditar')
            </form>
        </div>
    </div>
</div>
@endsection