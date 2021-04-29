@extends("layouts.app")

@section('contenido')

    <div class="title">
       <h1 align="center"><b>Pre Visualizacion Reporte Inventario Actual</b></h1>
    </div>

    <div class="card mt-2">
        <div class="card-body">

            <header class="clearfix">
              <div id="logo">
                  <img class="logo" src="{{ asset('images/GobernacionLogo.png') }}">
              </div><br>
              <h5 style=" text-align: center;"><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
                  Almacen Central<br>
                  Inventario Actual
              </h5>
              <div class="card-body">
                <h6 ><b>Reporte Generado por el Usuario: </b>{{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h6>
                {{-- <h6><b>CI: </b>{{auth()->user()->CI}}</h6> --}}
                <h6><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</h6>
              </div>
          </header>

        {{-- <main> --}}
          @foreach($partidas as $partida)
            @php
              $SubTotal =  0.00;
              $Total =  0.00;
            @endphp
          <table class="table table-bordered">
              <thead>
                <tr class="table-primary">
                  <th colspan="5">Partida: {{$partida->NRO_PARTIDA}}| {{ $partida->NOM_PARTIDA }}</th>
                </tr>
                <tr>
                  <th>ITEM</th>
                  <th>NOMBRE</th>
                  <th>STOCK</th>
                  <th>MEDIDA</th>
                  <th>IMPORTE</th>
                </tr>
              </thead>
              <tbody>
                @foreach($partida->Articulos as $index=>$articulo)
                  @php
                    $PrecioPonderado =  0.00;
                    $Total_cant_DCS =  0.00;
                    $Total_cant_SAL =  0.00;
                    $Total_prec_DCS =  0.00;
                    if ($articulo->total_cant_DCS > 0){
                      $Total_cant_DCS = $articulo->total_cant_DCS;
                      $PrecioPonderado = $articulo->total_prec_DCS/$articulo->total_cant_DCS;
                    }
                    if ($articulo->total_cant_SAL > 0) {
                      $Total_cant_SAL = $articulo->total_cant_SAL;
                    }
                    if ($articulo->total_prec_DCS > 0) {
                      $Total_prec_DCS = $articulo->total_prec_DCS;
                    }
                    $Total += $PrecioPonderado*($Total_cant_DCS - $Total_cant_SAL);
                  @endphp
                  <tr>
                    <td class="inf">{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
                    <td class="inf">{{$articulo->NOM_ARTICULO}}</td>
                    <td class="inf">{{$Total_cant_DCS - $Total_cant_SAL}}</td>
                    <td class="inf">{{$articulo->Medida->NOM_MEDIDA}}</td>
                    <td class="inf">bs/ {{number_format($PrecioPonderado*($Total_cant_DCS - $Total_cant_SAL), 2, '.', '')}}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3"></td>
                  <td class="inf">Total: </td>
                  <td class="inf">Bs/ {{number_format($Total, 2, '.', '')}}</td>
                </tr>
              </tfoot>
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
            <a href="{{route('list_reportesInventarioActual')}}" class="btn formulario__btn2">Volver Atras</a>
        </div>
      </div>
    </div>
@endsection