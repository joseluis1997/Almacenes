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
        <h1 align="center"><b>Nuevo Consumo Directo</b></h1>
    </div>

    <div class="card mt-10">
        <div class="card-body">
            <form  action="{{ route('store_consumodirecto')}}" method="POST" enctype="multipart/form-data" id="formulario">
                @csrf
                @include('admin.ConsumoDirecto.formCrear')
                 {{-- Grupo: Boton Cancelar y Guardar --}}
            <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{route('list_consumodirecto')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Guardar</button>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/consumo_directo.js') }}"></script>
    <script type="text/javascript">
        $(function () {
          $('[data-toggle="popover"]').popover()
        }) 
    </script>
    <script>
        $(document).ready(function(){
            $('#btn_add').click(function(){
                agregar();
            });
        });
        var contador = 0;
        total = 0;
        subtotal=[];

        $("#Guardar").hide();
        // $("#pidarticulo").change(mostrarvalores);

        function agregar(){
            // idarticulo = $("#pidarticulo").val();
            datosArticulos= document.getElementById('pidarticulo').value.split('_');


            idarticulo = datosArticulos[0];


            articulo = $("#pidarticulo option:selected");
            if(articulo.attr('disabled')!=undefined){
                alert('producto agregado');
                return 
            }
            cantidad = parseFloat($("#cantidad").val()).toFixed(2);
            precio = parseFloat($("#precio").val()).toFixed(2);
            

            if(idarticulo != null && idarticulo > 0 && cantidad != null && cantidad > 0 && precio != null && precio>0){
                articulo.attr('disabled','disabled');
                articulo = $("#pidarticulo option:selected").text();   

                subtotal[contador] =(cantidad*precio);
                total = total+subtotal[contador];

                var fila = '<tr class="selected filaConsumo" id="fila'+contador+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+contador+')">X</button></td><td><input type="hidden" name="articulos[]" value="'+idarticulo+'"></input>'+articulo+'</td><td><input type="number" name="cantidad_'+idarticulo+'" value="'+cantidad+'" readonly></input></td><td><input type="number" name="precio_'+idarticulo+'" value="'+precio+'" readonly></td><td>'+parseFloat(subtotal[contador]).toFixed(2)+'</td></tr>';

                contador++;
                limpiar();

                $("#total").html("Bs/ "+parseFloat(total).toFixed(2));


                evaluar();
                $('#detalles').append(fila);

            }else{
                alert("Error al ingresar el detalle del consumo directo, revise sus datos");
            }
        }

        function limpiar(){
            $("#pidarticulo").val(" ");
            $("#cantidad").val(" ");
            $("#precio").val(" ");
        }

        function evaluar(){
            // if(total > 0){
            //     $("#Guardar").show();
            // }else{
            //     $("#Guardar").hide();
            // }
            let filasPedido = $('.filaConsumo').length; 
            console.log(filasPedido);
            if(filasPedido>0 || total>0){
                $("#Guardar").show();
            }else{
                $("#Guardar").hide();
            }
        }

        function eliminar(index){
            // alert(index);
            $('#articulo_'+index).removeAttr('disabled');
            total = total-subtotal[index];
            $("#total").html("Bs/."+total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endsection