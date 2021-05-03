@extends("layouts.app")

@section('contenido')

    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Fisico Valorado Stock Almacen</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">
        	<header class="clearfix">
			    <div id="logo">
			        <img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
					    </div>
		        <h5 style=" text-align: center;"><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
		            Almacen Central<br>
		            Reporte Fisico Stock Almacen
		        </h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
		        </div>
    		</header>
    		{{-- <main> --}}
			    @php
			    	$TotalMonto = 0.00;
			        $TotalIngresos =  0.00;
			        $TotalEgresos =  0.00;
			    @endphp
      			@foreach($partidas as $partida)
			        @php
			          $SubTotalIngresos =  0.00;
			          $SubTotalEgresos =  0.00;
			          $SubTotal =  0.00;
			        @endphp
			        <table class="table table-bordered">
			          	<thead >
				            <tr class="table-primary">
				            	<th colspan="3" width="50%">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
				            	<th colspan="3">FISICOS</th>
				            	<th colspan="3">VALORADOS</th>
				            </tr>
				            <tr>
				            	<th>ITEM</th>
				            	<th>NOMBRE</th>
				            	<th>U. MEDIDA</th>
				            	<th>INGRESOS</th>
				            	<th>EGRESOS</th>
				            	<th>SALDO</th>
				            	<th>INGRESOS</th>
				            	<th>EGRESOS</th>
				            	<th>SALDO</th>
				            </tr>
			          	</thead>
			          	<tbody>
			            	@foreach($partida->Articulos as $index=>$articulo)
			              	@php
				                $PrecioPonderado = 0.00;
				                $Total_cant_DCS =  0.00;
				                $Total_cant_SAL =  0.00;
				                $Total_prec_DCS =  0.00;
				                if ($articulo->total_cant_DCS > 0){
				                  $Total_cant_DCS = $articulo->total_cant_DCS;
				                  $PrecioPonderado = $articulo->total_prec_DCS/$articulo->total_cant_DCS;
				                  $PrecioPonderado = round($PrecioPonderado,2);
				                }
				                if ($articulo->total_cant_SAL > 0) {
				                  $Total_cant_SAL = $articulo->total_cant_SAL;
				                }
				                if ($articulo->total_prec_DCS > 0) {
				                  $Total_prec_DCS = $articulo->total_prec_DCS;
				                }
			              	@endphp
			             	<tr>
				                <td class="inf">{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
				                <td class="inf">{{$articulo->NOM_ARTICULO}}</td>
				                <td class="inf">{{$articulo->Medida->NOM_MEDIDA}}</td>
				                <td class="inf">
				                  {{number_format($Total_cant_DCS, 2, '.', '')}}
				                </td>
				                <td class="inf">
				                  {{number_format($Total_cant_SAL, 2, '.', '')}}
				                </td>
				                <td class="inf">
				                  {{number_format($Total_cant_DCS - $Total_cant_SAL, 2, '.', '')}}
				                </td>
				                <td class="inf">Bs/
				                  {{number_format($Total_cant_DCS*$PrecioPonderado, 2, '.', '')}}
				                </td>
				                <td class="inf">Bs/
				                  {{number_format($Total_cant_SAL*$PrecioPonderado, 2, '.', '')}}
				                </td>
				                <td class="inf">Bs/
				                  {{number_format($PrecioPonderado*($Total_cant_DCS - $Total_cant_SAL), 2, '.', '')}}
				                </td>
			              	</tr>
			              	@php
				                $SubTotalIngresos +=  $Total_cant_DCS*$PrecioPonderado;
				                $SubTotalEgresos +=  $Total_cant_SAL*$PrecioPonderado;
				                $SubTotal +=  $PrecioPonderado*($Total_cant_DCS - $Total_cant_SAL);
			              	@endphp
			            	@endforeach
				            @php
				              $TotalIngresos +=  $SubTotalIngresos;
				              $TotalEgresos +=  $SubTotalEgresos;
				              $TotalMonto += $SubTotal;
				            @endphp
			        	</tbody>
			          	<tfoot>
				            <tr>
				            	<td class="table-light"colspan="5"></td>
				            	<td class="table-light">Total: </td>
				            	<td class="table-light">Bs/
				                	{{number_format($SubTotalIngresos, 2, '.', '')}}
				            	</td>
				            	<td class="table-light">Bs/
				                	{{number_format($SubTotalEgresos, 2, '.', '')}}
				            	</td>
				            	<td class="table-light">Bs/
				                	{{number_format($SubTotal, 2, '.', '')}}
				            	</td>
				            </tr>
			          	</tfoot>
			        </table>
      			@endforeach
		    	<div>
			        <div>
			          <b>Stock Almacen:</b>
			          <p>
			            Total Ingresos: <b>{{$TotalIngresos}}</b>
			          </p>
			          <p>
			            Total Egresos: <b>{{$TotalEgresos}}</b>
			          </p>
			          <p>
			            Total Monto: <b>{{$TotalMonto}}</b>
			          </p>
			        </div>
		        {{-- <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div> --}}
		      	</div>
		      	<br><br>
		      	<div class="card-body">
            		<h6 ><b>Firma:_______________________</h6>
            		<h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
    			</div>
    		{{-- </main> --}}
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_FisicoValoradoStockAlmacen')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      	</div>
    </div>
@endsection