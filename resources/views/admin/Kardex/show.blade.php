@extends("layouts.app")

@section('contenido')
    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Consolidado Valorado Total</b></h1>
    </div>
    <div class="card mt-2">
        <div class="card-body">
    	   	<header class="clearfix">
			    	<div id="logo">
			        	<img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
			    	</div>
		        <h5 style="text-align: center;">
		          <b>
		            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA<br>
		          </b>
		          	ALMACEN CENTRAL
		          <br>
		          	Kardex de Articulo
		        </h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
	      		</div>
   	 			</header>
   	 			<table class="table table-bordered">
   	 				<thead class="table-primary">
		          <tr>
		          	<th>Articulo:</th>
		            <th>U. Medida</th>
		            <th>Partida:</th>
		            <th>Ubicacion:</th>
		          </tr>
	          </thead>
	          <tr>
	            <td>{{$articulo->NOM_ARTICULO}}</td>
	            <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
	            <td><b>{{$articulo->Partida->NRO_PARTIDA}}</b> - {{$articulo->Partida->NOM_PARTIDA}}</td>
	            <td>Almacen Central</td>
	          </tr>
      		</table><br>
		      <table class="table table-bordered">
		      	<thead class="table-primary">
			        <tr>
			          <th rowspan="2">Fecha</th>
			          <th width="15%" rowspan="2">Unidad Sol.</th>
			          <th rowspan="2">Precio U.</th>
			          <th colspan="2">Entradas</th>
			          <th colspan="2">Salidas</th>
			          <th colspan="2">Saldos</th>
			        </tr>
			        <tr>
			          <th>Cant.</th>
			          <th>Val.</th>
			          <th>Cant.</th>
			          <th>Val.</th>
			          <th>Cant.</th>
			          <th>Val.</th>
			        </tr>
		        </thead>
		        @php
		          $valor_ant = 0;
		          $valor_act = 0;
		          $cant_ant = 0;
		          $cant_act = 0;
		          $costo_pond = 0;
		        @endphp
		        @foreach ($collections as $collection)
		          @if($collection->COD_COMPRA_STOCK > 0)
		            @php
		              $cant_act = $collection->pivot->CANTIDAD;
		              $valor_act = $collection->pivot->CANTIDAD * $collection->pivot->PRECIO_UNITARIO;
		              $aux1 = $valor_ant+$valor_act;
		              $aux2 = $cant_ant+$cant_act;
		              $costo_pond = $aux1/$aux2;
		            @endphp
		            <tr>
		              <td>{{$collection->FECHA}}</td>
		              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
		              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
		              <td>{{number_format($cant_act, 2, '.', '')}}</td>
		              <td>{{number_format($valor_act, 2, '.', '')}}</td>
		              <td></td>
		              <td></td>
		              @php
		                $cant_ant = $cant_ant+$cant_act;
		                $valor_ant = $cant_ant*$costo_pond;
		              @endphp
		              <td>{{number_format($cant_ant, 2, '.', '')}}</td>
		              <td>bs {{number_format($valor_ant, 2, '.', '')}}</td>
		            </tr>
		          @elseif($collection->COD_SALIDA > 0)
		            @php
		              $cant_act = $collection->pivot->CANTIDAD;
		              $valor_act = $collection->pivot->CANTIDAD * $costo_pond;
		            @endphp
		            <tr>
		              <td>{{$collection->FECHA}}</td>
		              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
		              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
		              <td></td>
		              <td></td>
		              <td>{{number_format($cant_act, 2, '.', '')}}</td>
		              <td>{{number_format($valor_act, 2, '.', '')}}</td>
		              @php
		                $cant_ant = $cant_ant-$cant_act;
		                $valor_ant = $cant_ant*$costo_pond;
		              @endphp
		              <td>{{number_format($cant_ant, 2, '.', '')}}</td>
		              <td>bs {{number_format($valor_ant, 2, '.', '')}}</td>
		            </tr>
		          @else
		            <tr>
		              <td>{{$collection->FECHA}}</td>
		              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
		              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
		              <td>{{number_format($collection->pivot->CANTIDAD, 2, '.', '')}}</td>
		              <td>{{number_format(($collection->pivot->CANTIDAD * $collection->pivot->PRECIO_UNITARIO), 2, '.', '')}}</td>
		              <td></td>
		              <td></td>
		              @php
		                $aux1 = $cant_ant+$collection->pivot->CANTIDAD;
		                $aux2 = $aux1*$costo_pond;
		              @endphp
		              <td>{{number_format($aux1, 2, '.', '')}}</td>
		              <td>bs {{number_format($aux2, 2, '.', '')}}</td>
		            </tr>
		            <tr>
		              <td>{{$collection->FECHA}}</td>
		              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
		              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
		              <td></td>
		              <td></td>
		              <td>{{number_format($collection->pivot->CANTIDAD, 2, '.', '')}}</td>
		              <td>{{number_format(($collection->pivot->CANTIDAD * $collection->pivot->PRECIO_UNITARIO), 2, '.', '')}}</td>
		              @php
		                $aux1 = $cant_ant;
		                $aux2 = $aux1*$costo_pond;
		              @endphp
		              <td>{{number_format($aux1, 2, '.', '')}}</td>
		              <td>bs {{number_format($aux2, 2, '.', '')}}</td>
		            </tr>
		          @endif
		        @endforeach
		      </table>
	    
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_kardexAlmacen')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      	</div>
    </div>
@endsection