@extends('layouts.app')

@section('contenido')
	 <div class="title">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif
        <h3><b>Nueva Partida</b></h3>
    </div>
    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_partidas')}}"  id="formulario" class="form-horizontal form--label-right" method="POST">
                @csrf
                @include('admin.partida.formCrear')
            </form>
        </div>
    </div>

@endsection('contenido')

@section('scripts')
    <script src="{{ asset('js/partidas.js') }}"></script>
    <script type="text/javascript">
     
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection