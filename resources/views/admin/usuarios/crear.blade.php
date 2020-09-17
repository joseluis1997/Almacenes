@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center">Nuevo Usuario</h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_users')}}"  id="formulario" class="formulario" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.usuarios.formularioCrearUsuario')

                {{-- <div class="text-center">
                     <!-- @include('includes.boton-form-crear',['name'=>'Guardar','color'=>'primary']) -->
                     <button class="btn btn-outline-success" type="submit">Guardar</button>
                    <a href="{{route('list_users')}}" class="btn btn-outline-danger">Cancelar</a>                 
                </div> --}}

                
            </form>
        </div>
    </div>
@endsection

