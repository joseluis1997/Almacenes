@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="card-title"><b>Modificar Partida</b></h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form action="{{route('update_partidas',$partida->COD_PARTIDA)}}" id="formulario" class="form-horizontal form--label-right" method="POST" >
             @csrf @method("put")
                    @include('admin.partida.formEditar')
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/partidas.js') }}"></script>
    <script type="text/javascript">
     
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection