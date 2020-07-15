@extends("layouts.app") 

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-5">
                <a href="{{route('list_users')}}" class="btn btn-secondary">
                    Volver Atras
                </a>
            </div>
            <div class="col-md-6">
                <h3 class="card-title">Editar Usuario</h3> 
            </div>
            </div>
        </div>
        <div class="card-body">    
            <form action="{{route('user_update',$user->id)}}" id="form-general" class="form-horizontal form--label-right" method="POST" >
             @csrf @method("put")
                <div class="card-body">
                    @include('admin.usuarios.formularioEditarUsuario')
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-6">
                            @include('includes.boton-form-editar',['name'=>'Editar Usuario'])
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
