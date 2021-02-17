@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Nueva Salida</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_salidas')}}"  id="formulario" class="formulario" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.Salidas.formCrear')
              
            </form>
        </div>
    </div>
@endsection