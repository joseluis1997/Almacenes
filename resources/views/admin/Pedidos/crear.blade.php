@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Nuevo Pedido</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_areas')}}"  id="formulario" class="formulario" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.Pedidos.form')
              
            </form>
        </div>
    </div>
@endsection