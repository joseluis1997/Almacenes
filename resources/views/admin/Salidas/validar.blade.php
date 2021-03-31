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
        <h1 align="center"><b>Validar Salidad del Pedido</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
            <form  action="{{ route('store_salidas',$pedido->COD_PEDIDO) }}" method="POST" enctype="multipart/form-data" id="formulario" >
                @csrf 
                @include('admin.Salidas.ValidarPedido')

                <!-- Grupo: Guardar y Cancelar -->
                <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
                    <a href="{{route('list_salidas')}}" class="btn formulario__btn2">Cancelar</a>
                    <button type="submit" class="formulario__btn1">Validar Pedido</button>
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
            mostrarvalores();
            evaluar();
            $('#btn_add').click(function(){
                agregar();
            });
        });
        var contador = 0;
        total = 0;
        subtotal=[];

        $("#Guardar").hide();
        $("#pidarticulo").change(mostrarvalores);

        function mostrarvalores(){
            datosArticulos= document.getElementById('pidarticulo').value.split('_');
            $("#pstock").val(datosArticulos[1]);
        }

        function agregar(){

            datosArticulos= document.getElementById('pidarticulo').value.split('_');

            idarticulo = datosArticulos[0];


            articulo = $("#pidarticulo option:selected");
            if(articulo.attr('disabled')!=undefined){
                alert('producto agregado');
                return 
            }
            cantidad = parseFloat($("#cantidad").val());

            stock = parseFloat($("#pstock").val());
        
            if(idarticulo !="" && cantidad !="" && cantidad > 0){
                // subtotal[contador] =(cantidad*precio);
                // total = total+subtotal[contador];
                if(stock>=cantidad){
                    articulo.attr('disabled','disabled');
                    articulo = $("#pidarticulo option:selected").text();

                    var fila = '<tr class="selected filaPedido" id="fila'+idarticulo+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+idarticulo+')">X</button></td><td><input type="hidden" name="articulos[]" value="'+idarticulo+'"></input>'+articulo+'</td><td><input type="hidden" name="cantidad_'+idarticulo+'" value="'+cantidad+'" ></input><input type="number" value="'+cantidad+'" disabled ></input></td></tr>';

                    contador++;
                    limpiar();

                    $('#detalles').append(fila); 
                    evaluar();
                }
                else{
                    alert('Cantidad selecionada del pedido supera el stock del almacen');
                }

            }else{
                alert("Error al ingresar el detalle del nuevo pedido, revise sus datos");
            }
        }

        function limpiar(){
            $("#pidarticulo").val("");
            $("#cantidad").val("");
            // $("#precio").val("");
        }

        function evaluar(){
            let filasPedido = $('.filaPedido').length; 
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
            // $("#total").html("Bs/."+total); 
            $("#fila"+index).remove();
            evaluar();
        }
    </script>
@endsection