    @extends('layouts.app')

@section('contenido')
     <div class="title">
        <h3 class="card-title"><b>Modificar Unidad de Medida:</b> {{$medida->NOM_MEDIDA}}</h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('update_medidas',$medida->COD_MEDIDA)}}"  id="form-general" class="form-horizontal form--label-right" method="POST">
                @csrf @method("put")
                @include('admin.medida.formEditar')
            </form>
        </div>
    </div>

@endsection('contenido')