@extends("layouts.app")

@section('contenido')
    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte por Areas de los Consumos Directos</b></h1>
    </div>
    <div class="card mt-2">
        <div class="card-body">
    	   	<header class="clearfix">
			    	<div id="logo">
			        	<img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
			    	</div>
			    	<h5 style="text-align: center;">
		          <b>
		            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA
		          </b><br>
         		 		ALMACEN CENTRAL
          		<br>
          		Reporte por Areas de los Consumos Ddirectos
        		</h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
	      		</div>
   	 			</header>
 			    {{-- <main> --}}
			      <div>
			        @if($area_ok)
			        <p>
			          <b>Area: </b> {{$area}}
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
			      @php
			        $TotalMonto = 0.00;
			      @endphp
			      @foreach($areas as $Area)
			        <table class="table table-bordered">
			        	<thead class="table-primary">
				          <tr>
				            <th colspan="6">Area: {{$Area->NOM_AREA}}</th>
				          </tr>
			          </thead>
			          <tbody>
			            @foreach($Area->ConsumoDirectos as $indexA=>$consumo)
			              <tr class="tr-consumos">
			                <td class="table-secondary" rowspan="2" colspan="2"><b>Consumo Directo: </b></td>
			                <td class="table-secondary"><b>FECHA</b></td>
			                <td class="table-secondary"><b>CODIGO</b></td>
			                <td class="table-secondary"><b>NRO COMPRA</b></td>
			                <td class="table-secondary"><b>NRO PREVENTIVO</b></td>
			              </tr>
			              <tr class="tr-consumos">
			                <td>{{$consumo->FECHA}}</td>
			                <td>{{$consumo->COD_CONSUMO_DIRECTO}}</td>
			                <td>{{$consumo->NRO_ORD_COMPRA}}</td>
			                <td>{{$consumo->NRO_PREVENTIVO}}</td>
			              </tr>
			              @php
			                $SubTotal =  0.00;
			                $Total =  0.00;
			              @endphp
			              <tr class="tr-articulos">
			                <td class="table-secondary " rowspan="{{count($consumo->Articulos)+1}}"><b>Articulos del consumo directo:</b></td>
			                <td class="table-secondary"><b>Nombre</b></td>
			                <td class="table-secondary"><b>Medida</b></td>
			                <td class="table-secondary"><b>Cantidad</b></td>
			                <td class="table-secondary"><b>Precio U.</b></td>
			                <td class="table-secondary"><b>Total</b></td>
			              </tr>
			              @foreach($consumo->Articulos as $articulo)
			                <tr class="tr-articulos">
			                  <td>{{$articulo->NOM_ARTICULO}}</td>
			                  <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
			                  <td>{{number_format($articulo->pivot->CANTIDAD, 2, '.', '')}}</td>
			                  <td>{{number_format($articulo->pivot->PRECIO_UNITARIO, 2, '.', '')}}</td>
			                  @php
			                    $SubTotal =  $articulo->pivot->CANTIDAD * $articulo->pivot->PRECIO_UNITARIO;
			                    $Total =  $Total+$SubTotal;
			                    $TotalMonto +=  $Total;
			                  @endphp
			                  <td>{{number_format($SubTotal, 2, '.', '')}}</td>
			                </tr>
			              @endforeach
			              <tr class="tr-articulos">
			                <td colspan="4">&#160;</td>
			                <td><b>Total</b></td>
			                <td><b>BS/ {{number_format($Total, 2, '.', '')}}</b></td>
			              </tr>
			              <tr>
			                <td colspan="6">&#160;</td>
			              </tr>
			            @endforeach
			          </tbody>
			        </table>
			      @endforeach

			      <div>
			        <div><b>Monto Total:</b> {{ number_format($TotalMonto, 2, '.', '') }} Bs.</div>
			        {{-- <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div> --}}
			      </div><br><br>
			      <div class="card-body">
            		<h6 ><b>Firma:_______________________</h6>
            		<h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
    				</div>
    			{{-- </main> --}}
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_area_egresos_salidas')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      	</div>
    </div>
@endsection