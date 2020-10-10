@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-9">
                <h3 class="card-title"><b>Gestionar Unidades Medidas</b></h3> 
            </div>
            <div class="col-md-2">
                <a href="{{route('create_medidas')}}" class="btn btn-primary rounded-pill float-left"><b>Nuevo Unidad de Medida</b></a>
            </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="#" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Modificar Unidad de Medida</th>
                        <th>Eliminar Unidad de Medida</th>
                    </tr>
                    </thead>
                        <tbody>
                            @foreach($medidas as $medida)
                              <tr>
                                <td>{{ $medida->COD_MEDIDA  }}</td>
                                <td>{{ $medida->NOM_MEDIDA  }}</td>
                                <td>{{ $medida->DESC_MEDIDA }}</td>
                                <td> 
                                    <form action="{{route('destroy_medida', $medida->COD_MEDIDA)}}" onsubmit="submitForm(event, {{$medida->ESTADO_MEDIDA}}, this)" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        @if($medida->ESTADO_MEDIDA)
                                          <button type="submit" class="btn-sm btn btn-outline-danger w-100">
                                            Deshabilitar
                                          </button>
                                        @else
                                          <button type="submit" class="btn-sm btn btn-outline-primary w-100">
                                            Habilitar
                                          </button>

                                        @endif
                                    </form>
                                </td> 
                                <td>
                                   <a href="{{route ('edit_medidas',$medida->COD_MEDIDA)}}" class="fas fa-edit fa-2x"></a>
                                </td>
                                <td>
                                    <a href="{{route ('destroy_medidas',$medida->COD_MEDIDA)}}" style="color:red;" class="fas fa-trash-alt fa-2x" onclick="eliminar(event);"></a>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
            </table> 
        </div>
    </div>
</div>
  
@endsection('contenido')

@section('scripts')
    <script type="text/javascript">
        function submitForm(event, estado,form) { 
        event.preventDefault();
        var r = null;
        if(estado == 1){
          r = confirm("Acepta deshabilitar el medida");
        }else{
          r = confirm("Acepta habilitar el medida");
        }
        if (r == true) {
          form.submit();
        }
  }

  function eliminar(event) {
  
    var r = confirm("Acepta elminar la Unidad de Medida Seleccionado?");
    if (r == true) {

    } 
    else {
         event.preventDefault();
     }
}
    </script>
@endsection