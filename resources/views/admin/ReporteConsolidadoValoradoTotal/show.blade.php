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
            <h5 style="text-align: center;"><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
                ALMACEN CENTRAL<br>
                REPORTE CONSOLIDADO VALORADO TOTAL
            </h5>
          </header>
          <div class="card-body">
              <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
              <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
          </div>
          {{-- <main> --}}
            <table class="table table-bordered">
              <thead class="table-primary">
                <tr>
                  <th>PARTIDA PRESUPUESTARIA</th>
                  <th>INGRESOS VALORADOS</th>
                  <th>EGRESOS VALORADOS</th>
                  <th>SALDO ACTUAL</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $Total =  0.00;
                @endphp
                @foreach($partidas as $partida)
                  @php
                    $TotalIngresos =  0.00;
                    $TotalSalidas =  0.00;
                    $TotalPartida =  0.00;
                  @endphp
                  @foreach($partida->Articulos as $index=>$articulo)
                    @php
                      if($articulo->total_prec_DCS > 0){
                        $TotalIngresos +=  $TotalIngresos+$articulo->total_prec_DCS;
                      }else{
                        $TotalIngresos += 0.00;
                      }
                      if($articulo->total_cant_DCS > 0){
                        $TotalSalidas += $articulo->total_cant_SAL*($articulo->total_prec_DCS/$articulo->total_cant_DCS);
                      }else{
                        $TotalSalidas += 0.00;
                      }
                    @endphp
                  @endforeach
                  @php
                    $TotalPartida +=  $TotalIngresos-$TotalSalidas;
                    $Total =  $Total+$TotalPartida;
                  @endphp
                  <tr>
                    <td class="table-secondary" style="text-align:left;" width="40%">
                      <b>{{$partida->NRO_PARTIDA}}</b>|{{ $partida->NOM_PARTIDA}}
                    </td>
                    <td class="table-light">{{number_format($TotalIngresos, 2, '.', '')}} Bs.</td>
                    <td class="table-light">{{number_format($TotalSalidas, 2, '.', '')}} Bs.</td>
                    <td class="table-light">{{number_format($TotalPartida, 2, '.', '')}} Bs.</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div>
              <div><b>Consolidado valorado Total:{{number_format($Total, 2, '.', '')}} Bs.</b></div>
            </div>
            <br><br>
            <div class="card-body">
                <h6 ><b>Firma:_______________________</h6>
                <h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
            </div>
{{--           </main> --}}
	        <div class="formulario__grupo formulario__btn-guardar text-center" id="Guardar">
	            <a href="{{route('list_ConsolidadoFisicoValoradoTotal')}}" class="btn formulario__btn2">Volver Atras</a>
	        </div>
      	</div>
    </div>
@endsection