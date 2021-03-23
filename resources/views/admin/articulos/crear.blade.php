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
        <h1 align="center"><b>Nueva Articulo</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_articulos')}}" class="formulario" method="POST" enctype="multipart/form-data" id="formulario">
                @csrf
                
                @include('admin.articulos.formCrear')
              
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/ValidarformularioArticulo.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection