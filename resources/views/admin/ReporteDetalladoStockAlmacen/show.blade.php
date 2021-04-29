@extends("layouts.app")



@section('contenido')

    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Fisico Valorado Compras</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
        	<header class="clearfix">
			    <div id="logo">
			        <img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
					    </div>
		        <h5 style=" text-align: center;"><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
		            Almacen Central<br>
		            Reporte Detallado Compras
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
			        <tr class="table-primary">
			            <th colspan="10">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
			        </tr>
		          	<tr>
			            <th>FECHA</th>
			            <th>CODIGO</th>
			            <th>PREVENTIVO</th>
			            <th>SOLICITANTE</th>
			            <th>ITEM</th>
			            <th>NOMBRE</th>
			            <th>MEDIDA</th>
			            <th>CANTIDAD</th>
			            <th>P.U</th>
			            <th>TOTAL</th>
		          	</tr>
		          	<tbody>
		          		@php
		          			$totalp = 0.00;
		          		@endphp
			            @foreach($partida->Articulos as $indexA=>$articulo)
			              	@php
				                $SubTotal =  0.00;
				                $Total =  0.00;
			              	@endphp
			              	@foreach($articulo->ComprasStocks as $compra)
				                <tr>
					                <td>{{$compra->FECHA}}</td>
					                <td>{{$compra->COD_COMPRA_STOCK}}</td>
					                <td>{{$compra->NRO_PREVENTIVO}}</td>
					                <td>{{$compra->Area->NOM_AREA}}</td>
					                <td>{{$partida->NRO_PARTIDA}} - {{$indexA+1}}</td>
					                <td>{{$articulo->NOM_ARTICULO}}</td>
					               	<td>{{$articulo->Medida->NOM_MEDIDA}}</td>
				                	<td>{{number_format($compra->pivot->CANTIDAD, 2, '.', '')}}</td>
				                	<td>{{number_format($compra->pivot->PRECIO_UNITARIO, 2, '.', '')}}</td>
				                  	@php
				                    	$SubTotal =  $compra->pivot->CANTIDAD * $compra->pivot->PRECIO_UNITARIO;
				                    	$Total =  $Total+$SubTotal;
				                  	@endphp
				                	<td>{{number_format($SubTotal, 2, '.', '')}}</td>
				                </tr>
			              	@endforeach
			              	{{-- <tr>
				                <td class="table-light" colspan="7">&#160;</td>
				                <td class="table-light"><b>Total</b></td>
				                <td class="table-light">&#160;</td>
				                <td class="table-light"><b>BS/ {{number_format($Total, 2, '.', '')}}</b></td>
			              	</tr> --}}
				            @php
				            	$totalp = $totalp+$Total;
				            @endphp
			            @endforeach
			            	<tr>
				                <td class="table-light" colspan="7">&#160;</td>
				                <td class="table-light"><b>Total</b></td>
				                <td class="table-light">&#160;</td>
				                <td class="table-light"><b>BS/ {{number_format($totalp, 2, '.', '')}}</b></td>
			              	</tr>
		          	</tbody>
		        </table>
		     {{--    @php
		          $Total = 0;
		        @endphp --}}
		    @endforeach
		    <br><br>
      		<div class="card-body">
            	<h6 ><b>Firma:_______________________</h6>
            	<h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
    		</div>
 {{--      <div>
        <div>Articulos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div> --}}
    	{{-- </main> --}}

	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_FisicoValoradoStockAlmacen')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      	</div>
    </div>
@endsection