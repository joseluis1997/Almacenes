@extends("layouts.app")

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
        <h1 align="center"><b>Modificar Salida</b></h1>
    </div>

    <div class="card mt-10">
        <div class="card-body">
            <form  action="{{ route('update_salidas',$salida->COD_SALIDA)}}"  id="formulario" method="POST" enctype="multipart/form-data">
                @csrf @method("put")
                
                @include('admin.Salidas.formEditar')

                <!-- Grupo: Guardar y Cancelar -->

                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_salidas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
              
            </form>
        </div>
    </div>
@endsection