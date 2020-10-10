@extends("layouts.app") 

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Modificar Usuario</b></h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form action="{{route('user_update',$user->id)}}" id="form-general" class="form-horizontal form--label-right" method="POST" enctype="multipart/form-data">
             @csrf @method("put")
                <div class="card-body">
                    @include('admin.usuarios.formularioEditarUsuario')
                </div>
                <div class="formulario__grupo formulario__btn-guardar text-center">
                    <a href="{{route('list_users')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
