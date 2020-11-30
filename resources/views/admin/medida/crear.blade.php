@extends('layouts.app')

@section('contenido')
	 <div class="title">
        <h3><b>Nueva Unidad de Medida</b></h3>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_medidas')}}"  id="form-general" class="form-horizontal form--label-right" method="POST">
                @csrf
                @include('admin.medida.formCrear')
            </form>
        </div>
    </div>

@endsection('contenido')

@section('scripts')
    <script type="text/javascript">
     
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection