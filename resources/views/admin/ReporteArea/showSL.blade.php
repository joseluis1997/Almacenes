@extends("layouts.app")

@section('contenido')
    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte por Areas de las Salidas</b></h1>
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
          		Reporte por Areas de las Salidas
        		</h5>
		        <div class="card-body">
		          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
		          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
	      		</div>
   	 			</header>
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
			      @foreach($areas as $Area)
			        <table class="table table-bordered">
			          <thead class="table-primary">
			          	<tr>
			            	<th colspan="4">Area: {{$Area->NOM_AREA}}</th>
			          	</tr>
			          </thead>
			          <tbody>

			            @foreach($Area->Salidas as $indexA=>$salida)
			              <tr class="tr-consumos">
			                <td class="table-secondary" rowspan="2"><b>Salida:</b></td>
			                <td class="table-secondary"><b>FECHA</b></td>
			                <td class="table-secondary"><b>CODIGO SALIDA</b></td>
			                <td class="table-secondary"><b>CODIDO PEDIDO</b></td>
			              </tr>
			              <tr class="tr-consumos">
			                <td>{{$salida->FECHA}}</td>
			                <td>{{$salida->COD_SALIDA}}</td>
			                <td>{{$salida->COD_PEDIDO}}</td>
			              </tr>
			              <tr class="tr-articulos">
			                <td class="table-secondary" rowspan="{{count($salida->Articulos)+1}}"><b>Articulos de la salida:</b></td>
			                <td class="table-secondary"><b>Nombre</b></td>
			                <td class="table-secondary"><b>Medida</b></td>
			                <td class="table-secondary"><b>Cantidad</b></td>
			              </tr>
			              @foreach($salida->Articulos as $articulo)
			                <tr class="tr-articulos">
			                  <td>{{$articulo->NOM_ARTICULO}}</td>
			                  <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
			                  <td>{{number_format($articulo->pivot->CANTIDAD, 2, '.', '')}}</td>
			                </tr>
			              @endforeach
			              <tr>
			                <td colspan="6">&#160;</td>
			              </tr>
			            @endforeach
			          </tbody>
			        </table>
			      @endforeach
			      <br><br>
			    <div class="card-body">
            		<h6 ><b>Firma:_______________________</h6>
            		<h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
    			</div>
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_area_egresos_salidas')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      	</div>
    </div>
@endsection