@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-6">
                <h3 class="card-title">Editar Partida: {{$partida->NOM_PARTIDA}}</h3> 
            </div>
            <div class="col-md-6">
                <a  href="{{route('list_partidas')}}" class="btn btn-secondary">
                    Volver Atras
                </a>
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
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-editar',['name'=>'Actualiza'])
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection