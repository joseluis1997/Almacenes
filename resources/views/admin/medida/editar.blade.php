    @extends('layouts.app')

@section('contenido')
     <div class="title">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h3 class="card-title"><b>Modificar Unidad de Medida:</b> {{$medida->NOM_MEDIDA}}</h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('update_medidas',$medida->COD_MEDIDA)}}"  id="formulario" class="form-horizontal form--label-right" method="POST">
                @csrf @method("put")
                @include('admin.medida.formEditar')
            </form>
        </div>
    </div>

@endsection('contenido')

@section('scripts')
    <script src="{{ asset('js/Medida.js') }}"></script>
    <script type="text/javascript">
     
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection