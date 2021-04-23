@extends("layouts.app")

@section('contenido')

    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Detallado Consumos Directos</b></h1>
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
		          REPORTE DETALLADO CONSUMOS DIRECTOS
		        </h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
		        </div>
    		</header>

    		{{-- <main> --}}
			    <div>
			        {{-- @if($partida_ok)
			        <p>
			          <b>PARTIDA: </b> {{$partida}}
			        </p>
			        @endif --}}
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
		            <th>AREA SOLICITANTE</th>
		            <th>ITEM</th>
		            <th>NOMBRE</th>
		            <th>MEDIDA</th>
		            <th>CANTIDAD</th>
		            <th>P.U</th>
		            <th>TOTAL</th>
		          </tr>
		        <tbody>
		            @foreach($partida->Articulos as $indexA=>$articulo)
		              @php
		                $SubTotal =  0.00;
		                $Total =  0.00;
		              @endphp
		              @foreach($articulo->ConsumosDirectos as $consumo)
		                <tr>
		                  <td class="inf">{{$consumo->FECHA}}</td>
		                  <td class="inf">{{$consumo->COD_CONSUMO_DIRECTO}}</td>
		                  <td class="inf">{{$consumo->NRO_PREVENTIVO}}</td>
		                  <td class="inf">{{$consumo->Area->NOM_AREA}}</td>
		                  <td class="inf">{{$partida->NRO_PARTIDA}} - {{$indexA+1}}</td>
		                  <td class="inf">{{$articulo->NOM_ARTICULO}}</td>
		                  <td class="inf">{{$articulo->Medida->NOM_MEDIDA}}</td>
		                  <td class="inf">{{number_format($consumo->pivot->CANTIDAD, 2, '.', '')}}</td>
		                  <td class="inf">{{number_format($consumo->pivot->PRECIO_UNITARIO, 2, '.', '')}}</td>
		                  @php
		                    $SubTotal =  $consumo->pivot->CANTIDAD * $consumo->pivot->PRECIO_UNITARIO;
		                    $Total =  $Total+$SubTotal;
		                  @endphp
		                  <td>{{number_format($SubTotal, 2, '.', '')}}</td>
		                </tr>
		            @endforeach
			            <tr>
			                <td colspan="7">&#160;</td>
			                <td style="background-color: #cbd7e2;">Total</td>
			                <td style="background-color: #cbd7e2;">&#160;</td>
			                <td style="background-color: #cbd7e2;">Bs/ {{number_format($Total, 2, '.', '')}}</td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		        @php
		          $Total = 0;
		        @endphp
		      @endforeach
      
  {{--     <div>
        <div>Reporte Detallado Consumos Directos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div> --}}
    {{-- </main> --}}
    		

	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_FisicoValoradoConsumoDirecto')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      </div>
    </div>
@endsection