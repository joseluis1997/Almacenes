@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
            <div class="col-md-12">
                <h3 class="card-title"><b>Modificar Proveedor</b></h3> 
            </div>
            </div>
        </div>
        <div class="card mt-2">
        <div class="card-body">    
            <form action="#" id="form-general" class="formulario" method="POST" enctype="multipart/form-data">
             @csrf @method("put")

                @include('admin.proveedores.formEditar')
            </form>
        </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        })  
    </script>
@endsection