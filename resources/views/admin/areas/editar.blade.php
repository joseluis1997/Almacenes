@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="card-title"><b>Modificar Area</b></h3> 
                    </div>
                </div>
            </div>

            <div class="card-body">    
                <form action="{{route('update_areas', ['area' => $area->COD_AREA])}}" id="form-general" class="formulario" method="POST" >
                    @csrf @method("put")

                    @include('admin.areas.formEditar')
                    <!-- Grupo: Identificador de Area -->
                    {{-- <div class="formulario__grupo" id="grupo__identificador">
                        <label for="identificador" class="formulario__label">Numero de Identificador de Area</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="NUM_AREA" id="identificador" value="{{$area->NUM_AREA}}" placeholder="numero de Identificador de Area">
                            <i class="formulario__validacion-estado far fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El area tiene que ser de 4 a 16 digitos y solo puede contener numeros, letras y guion bajo.
                        </p>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioUsuario.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection