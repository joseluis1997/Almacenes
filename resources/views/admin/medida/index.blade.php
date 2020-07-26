@extends('layouts.app')

@section('contenido')
  <div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-5">
                <a href="{{route('create_medidas')}}" class="btn btn-outline-primary rounded-pill float-left">Crear Nuevo</a>
            </div>
            <div class="col-md-6">
                <h3 class="card-title">Unidades Medidas</h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                        <tbody>
                            @foreach($medidas as $medida)
                              <tr>
                                <td>{{ $medida->COD_MEDIDA}}</td>
                                <td>{{ $medida->NOM_MEDIDA}}</td>
                                <td>{{ $medida->DESC_MEDIDA}}</td>

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
                                   <a href="{{route ('edit_medidas',$medida->COD_MEDIDA)}}" class="btn btn-outline-success rounded-pill">Editar</a>
                                    <a href="{{route ('destroy_medidas',$medida->COD_MEDIDA)}}" class="btn btn-outline-danger rounded-pill" onclick="eliminar(event);">Eliminar</a>
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