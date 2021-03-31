@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h3 class="card-title"><b>Modificar Area</b></h3> 
                    </div>
                </div>
            </div>

            <div class="card-body">    
                <form action="{{route('update_areas', ['area' => $area->COD_AREA])}}" id="formulario" class="formulario" method="POST" >
                    @csrf @method("put")

                    @include('admin.areas.formEditar')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/areas.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
        
    </script>
@endsection