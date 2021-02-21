@extends("layouts.app")

@section('contenido')

    <div class="title">
        <h1 align="center"><b>Nueva Consumo Directo</b></h1>
    </div>

    <div class="card mt-10">
        <div class="card-body">
            <form  action="{{ route('store_consumodirecto')}}" method="POST" enctype="multipart/form-data">
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
            cantidad = parseInt($("#cantidad").val());
            precio = parseInt($("#precio").val());
            

            if(idarticulo != " " && idarticulo > 0 && cantidad != " " && cantidad > 0 && precio != " "){
                articulo.attr('disabled','disabled');
                articulo = $("#pidarticulo option:selected").text();   

                subtotal[contador] =(cantidad*precio);
                total = total+subtotal[contador];

                var fila = '<tr class="selected filaConsumo" id="fila'+idarticulo+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+idarticulo+')">X</button></td><td><input type="hidden" name="articulos[]" value="'+idarticulo+'"></input>'+articulo+'</td><td><input type="hidden" name="cantidad_'+idarticulo+'" value="'+cantidad+'" ></input><input type="number" value="'+cantidad+'" disabled ></input></td><td><input type="hidden" name="precio_'+idarticulo+'" value="'+precio+'"></input><input type="number" value="'+precio+'" disabled ></input></td><td>'+subtotal[contador]+'</td></tr>';

                contador++;
                limpiar();

                $("#total").html("Bs/."+total);


                $('#detalles').append(fila);
                evaluar();

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
            // if(total > 0){
            //     $("#Guardar").show();
            // }else{
            //     $("#Guardar").hide();
            // }
            let filasPedido = $('.filaConsumo').length; 
            if(filasPedido>0){
                $("#Guardar").show();
            }else{
                $("#Guardar").hide();
            }
        }

        function eliminar(index){
            // alert(index);
            $('#articulo_'+index).removeAttr('disabled');
            // total = total-subtotal[index];
            $("#total").html("Bs/."+total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endsection