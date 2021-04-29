@extends("layouts.app")

@section('contenido')

    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Fisico Valorado Consumos Directos</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
        	<header class="clearfix">
			    <div id="logo">
			        <img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
					    </div>
		        <h5 style=" text-align: center;"><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
		            ALMACEN CENTRAL<br>
		            REPORTE FISICO VALORADO CONSUMOS DIRECTOS
		        </h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
		        </div>
    		</header>

    		{{-- <main> --}}
		      	@php
		        	$TotalMonto = 0.00;
		      	@endphp
		      	@foreach($partidas as $partida)
		        	@php
		         		$SubTotal =  0.00;
		          		$Total =  0.00;
		        	@endphp
			        <table class="table table-bordered">
			        	<thead>
				            <tr class="table-primary">
				            	<th colspan="3" >Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
				            	<th colspan="2">FISICOS</th>
				            	<th colspan="2">VALORADOS</th>
				            </tr>
				            <tr>
				            	<th>ITEM</th>
				            	<th>NOMBRE</th>
				            	<th>U. MEDIDA</th>
				            	<th>INGRESOS</th>
				            	<th>EGRESOS</th>
				            	<th>INGRESOS</th>
				            	<th>EGRESOS</th>
				            </tr>
			          	</thead>
				        <tbody>
				            @foreach($partida->Articulos as $index=>$articulo)
				            	@if($articulo->total_cantidad > 0)
					            <tr>
					            	<td class="inf">{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
					            	<td class="inf">{{$articulo->NOM_ARTICULO}}</td>
					            	<td class="inf">{{$articulo->Medida->NOM_MEDIDA}}</td>
					            	<td class="inf">{{$articulo->total_cantidad}}</td>
					            	<td class="inf">{{$articulo->total_cantidad}}</td>
					            	<td class="inf">Bs/ {{$articulo->total}}</td>
					            	<td class="inf">Bs/ {{$articulo->total}}</td>
					                @php
					                  if($articulo->total_cantidad <= 0){
					                    $SubTotal = 0;
					                    $Total = $Total + $SubTotal;
					                  }else{
					                    $SubTotal = $articulo->total;
					                    $Total = $Total + $SubTotal;
					                  }
					                @endphp
					            </tr>
				              	@endif
				            @endforeach
				        </tbody>
					        <tfoot>
					            <tr>
					            	<td colspan="5"></td>
					            	<td class="inf">Total: </td>
					            	<td class="inf">Bs/ {{number_format($Total, 2, '.', '')}}</td>
					            </tr>
					        </tfoot>
			        </table>
			        @php
			          $TotalMonto = $TotalMonto + $Total;
			        @endphp
		      	@endforeach
	      		<div>
			        <div>
			          <b>Consumo directo Total:</b>
			          <p>
			            Total: <b>Bs/ {{$TotalMonto}} </b>
			          </p>
			        </div><br><br><br>
		    		<div class="card-body">
		                <h6 ><b>Firma:_______________________</h6>
		                <h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
		        	</div>
	      		</div>
    		{{-- </main> --}}
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_FisicoValoradoConsumoDirecto')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      </div>
    </div>
@endsection