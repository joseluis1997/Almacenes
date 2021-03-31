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
        <h1 align="center"><b>Modificar Consumo Directo</b></h1>
    </div>

    <div class="card mt-10">
        <div class="card-body">
            <form  action="{{ route('update_consumodirecto',$consumo_directo->COD_CONSUMO_DIRECTO)}}" method="POST" enctype="multipart/form-data" id="formulario">
                @csrf @method("put")
                @include('admin.ConsumoDirecto.formEditar')
                 {{-- Grupo: Boton Cancelar y Guardar --}}
            <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <a href="{{route('list_consumodirecto')}}" class="btn formulario__btn2">Cancelar</a>
                <button type="submit" class="formulario__btn1">Modificar</button>
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
        var totalCD = 0;

        $(document).ready(function(){
            evaluar();
            mostrarvalores();
            $('#btn_add').click(function(){
                agregar();
            });
            modificarCD();
        });

        function modificarCD(){
            totalCD = 0;
            $("input[id*='cantidad_']").each(function( index ){
            let idarticulo = $( this ).attr('idarticulo');
            let cantidad =parseInt($( this ).val());
            let precio = parseInt($("#precio_"+idarticulo ).val());
            let subtotal = cantidad*precio;
            $("#subTotal_"+idarticulo ).html(subtotal);
            totalCD += subtotal;
            // console.log( index + ":" + $( this ).val() );
            })
            $("#total").html('Bs/.'+totalCD);
        }

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

            idarticulo = $("#pidarticulo").val();
            cantidad = $("#cantidad").val();
            precio = $("#precio").val();

            articulo = $("#pidarticulo option:selected");
            if(articulo.attr('disabled')!=undefined){
                alert('producto agregado');
                return 
            }

            if(idarticulo != null && cantidad != null && cantidad > 0 && precio != null){
                articulo.attr('disabled','disabled');
                articulo = $("#pidarticulo option:selected").text();

                subtotal[contador] =(cantidad*precio);
                total = total+subtotal[contador];
                var fila = '<tr class="selected filaConsumo" id="fila'+idarticulo+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+idarticulo+')">X</button></td><td><input type="hidden" name="articulos[]" value="'+idarticulo+'"></input>'+articulo+'</td><td><input type="hidden" name="cantidad_'+idarticulo+'" value="'+cantidad+'"></input><input type="number" idArticulo="'+idarticulo+'" value="'+cantidad+'" disabled id="cantidad_'+idarticulo+'"></input></td><td><input type="hidden" name="precio_'+idarticulo+'" value="'+precio+'" ></input><input type="number" value="'+precio+'" disabled id="precio_'+idarticulo+'" ></input></td><td id="subTotal_'+idarticulo+'"></td></tr>';

                contador++;
                limpiar();

                evaluar();

                $('#detalles').append(fila);
                modificarCD();

            }else{
                alert("Error al ingresar el detalle compra Stock, revise sus datos");
            }
        }
        function limpiar(){
            $("#pidarticulo").val("");
            $("#cantidad").val("");
            // $("#precio").val("");
        }

        function evaluar(){
            let filasPedido = $('.filaConsumo').length; 
            if(filasPedido>0 || filasPedido == " " ){
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
            modificarCD();
        }
    </script>
@endsection