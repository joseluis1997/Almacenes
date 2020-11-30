@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Nueva Area</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_areas')}}"  id="formulario" class="formulario" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.areas.formCrear')
              
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioUsuario.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection