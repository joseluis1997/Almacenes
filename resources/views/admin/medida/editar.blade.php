@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Modificar Unidad de Medida:</b> {{$medida->NOM_MEDIDA}}</h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form action="{{route('update_medidas',$medida->COD_MEDIDA)}}" id="form-general" class="form-horizontal form--label-right" method="POST" >
             @csrf @method("put")
                <div class="card-body">
                    <div class="form-group">
        				<label>Nombre</label>
        				<div class="input-group">
           					 <div class="input-group-prepend">
               				 <span class="input-group-text">N</span>
            			</div>
           					 <input type="text" class="form-control" placeholder="Nombre" name="NOM_MEDIDA" value="{{old('NOM_MEDIDA',$medida->NOM_MEDIDA)}}"required>
       					</div>
    				</div>
    
				    <div class="form-group">
				        <label>Descripcion</label>
				        <div class="input-group">
				            <div class="input-group-prepend">
				                <span class="input-group-text">D</span>
				            </div>
				            <textarea class="form-control" id="exampleFormControlTextarea1" name="DESC_MEDIDA" rows="3"  >{{old('DESC_MEDIDA',$medida->DESC_MEDIDA)}}</textarea>
				        </div>
				    </div>

                </div>

                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_medidas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection