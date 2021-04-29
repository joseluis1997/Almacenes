@extends("layouts.app")

@section('contenido')

    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Detallado Inventario Actual</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
        	<header class="clearfix">
			    <div id="logo">
			        <img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
			    </div>
		        <h5 style=" text-align: center;"><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
		            ALMACEN CENTRAL<br>
		            INVENTARIO ACTUAL DETALLADO
		        </h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
		        </div>
    		</header>
    		{{-- <main> --}}
		    <div>
		        @if($partida_ok)
		        <p>
		          <b>PARTIDA: </b> {{$partida}}
		        </p>
		        @endif
		        @if($fecha_ok)
		        <p>
		          <b>
		            PERIODO DEL REPORTE:
		          </b>
		          {{date('d-m-Y',strtotime($fecha_inicio))}} al
		          {{date('d-m-Y',strtotime($fecha_fin))}}
		        </p>
		        @endif
		    </div>
		    @foreach($partidas as $partida)
		        <table class="table table-bordered">
		          <thead>
		            <tr class="table-primary">
		              <th colspan="6">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}<br>
		              		<p style="font-weight: normal;">Descripcion:{{$partida->DESCRIPCION}}</p>
		              </th>
		            </tr>
		            <tr>
		              <th>NRO</th>
		              <th>ITEM</th>
		              <th colspan="3">NOMBRE</th>
		              <th>MEDIDA</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach($partida->Articulos as $indexA=>$articulo)
		              <tr class="text-center">
		                <td width="10%">{{$indexA+1}}</td>
		                <td width="10%">{{$partida->NRO_PARTIDA}} - {{$indexA+1}}</td>
		                <td colspan="3" width="10%">{{$articulo->NOM_ARTICULO}}</td>
		                <td width="10%">{{$articulo->Medida->NOM_MEDIDA}}</td>
		              </tr>
		              <tr>
		                <td colspan="3">&#160;</td>
		                <td><b>Cantidad</b></td>
		                <td><b>Precio Unitario</b></td>
		                <td><b>Total</b></td>
		              </tr>
		              @php
		                $SubTotal =  0.00;
		                $Total =  0.00;
		              @endphp
		              @foreach($articulo->ComprasStocks as $compra)
		                <tr style="text-align: center;">
		                  <td colspan="3">&#160;</td>
		                  <td>{{number_format($compra->pivot->CANTIDAD, 2, '.', '')}}</td>
		                  <td>{{number_format($compra->pivot->PRECIO_UNITARIO, 2, '.', '')}}</td>
		                  @php
		                    $SubTotal =  $compra->pivot->CANTIDAD * $compra->pivot->PRECIO_UNITARIO;
		                    $Total =  $Total+$SubTotal;
		                  @endphp
		                  <td>{{number_format($SubTotal, 2, '.', '')}}</td>
		                </tr>
		              @endforeach
		              <tr>
		                <td colspan="3">&#160;</td>
		                <td style="background-color: #cbd7e2;">Total</td>
		                <td style="background-color: #cbd7e2;">&#160;</td>
		                <td style="background-color: #cbd7e2;">BS/ {{number_format($Total, 2, '.', '')}}</td>
		              </tr>
		            @endforeach
		          </tbody>
		        </table>
		        @php
		          $Total = 0;
		        @endphp
		      @endforeach
		    <div class="card-body">
                <h6 ><b>Firma:_______________________</h6>
                <h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
        	</div>
    		{{-- </main> --}}
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_InventarioDetalladoAlmacen')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      </div>
    </div>
@endsection