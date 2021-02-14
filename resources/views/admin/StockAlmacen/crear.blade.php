@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Nueva Compra Stock Almacen</b></h1>
    </div>

    <div class="card mt-10">
        <div class="card-body">
            <form  action="{{ route('store_almacen')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @include('admin.StockAlmacen.formCrear')
                 {{-- Grupo: Boton Cancelar y Guardar --}}
            <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{route('list_almacen')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Guardar</button>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
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

        function agregar(){
            idarticulo = $("#pidarticulo").val();
            articulo = $("#pidarticulo option:selected").text();
            cantidad = $("#cantidad").val();
            precio = $("#precio").val();

            if(idarticulo != null && cantidad != null && cantidad > 0 && precio != null){
                subtotal[contador] =(cantidad*precio);
                total = total+subtotal[contador];
                var fila = '<tr class="selected" id="fila'+contador+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+contador+')">X</button></td><td><input type="hidden" name="articulos[]" value="'+idarticulo+'"></input>'+articulo+'</td><td><input type="number" name="cantidad_'+idarticulo+'" value="'+cantidad+'"></input></td><td><input type="number" name="precio_'+idarticulo+'" value="'+precio+'"></input></td><td>'+subtotal[contador]+'</td></tr>';

                contador++;
                limpiar();

                $("#total").html("Bs/."+total);

                evaluar();

                $('#detalles').append(fila);
            }else{
                alert("Error al ingresar el detalle compra Stock, revise sus datos");
            }
        }

        function limpiar(){
            $("#pidarticulo").val("");
            $("#cantidad").val("");
            $("#precio").val("");
        }

        function evaluar(){
            if(total > 0){
                $("#Guardar").show();
            }else{
                $("#Guardar").hide();
            }
        }

        function eliminar(index){
            // alert(index);
            total = total-subtotal[index];
            $("#total").html("Bs/."+total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endsection