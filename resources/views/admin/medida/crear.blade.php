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
        <h3><b>Nueva Unidad de Medida</b></h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_medidas')}}"  id="formulario" class="form-horizontal form--label-right" method="POST">
                @csrf
                @include('admin.medida.formCrear')
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