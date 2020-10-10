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
                <div class="card-body">
                    <div class="form-group">
        				<label>Nombre</label>
        				<div class="input-group">
           					 <div class="input-group-prepend">
               				 <span class="input-group-text">N</span>
            			</div>
           					 <input type="text" class="form-control" name="NOM_PARTIDA" value="{{old('NOM_PARTIDA',$partida->NOM_PARTIDA)}}"required>
       					</div>
    				</div>
    
				    <div class="form-group">
                        <label>Numero Partida</label>
                        <div class="input-group">
                             <div class="input-group-prepend">
                             <span class="input-group-text">N</span>
                        </div>
                             <input type="text" class="form-control" name="NRO_PARTIDA" value="{{old('NRO_PARTIDA',$partida->NRO_PARTIDA)}}"required>
                        </div>
                    </div>

                </div>
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_partidas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection