<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RepArCons</title>
    <link rel="stylesheet" href="style.css" media="all" />
      <style type="text/css">

      body {
        font-family: Arial, sans-serif; 
        font-size: 12px; 
        font-family: Arial;
        text-transform: uppercase !important;
      }

      header {
        padding: 10px 0;
        margin-bottom: 30px;
      }

      #logo {
        text-align: center;
        margin-bottom: 10px;
      }

      #logo img {
        width: 90px;
      }

      h4 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 1.5em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
      }

      table {
        width: 100%;
        border: none !important;
        border-collapse: collapse;
        margin-bottom: 15px;
      }

      table tr{
        border-spacing: 0px;
        background: #F5F5F5;
      }

      table th{
        text-align:center;
      }

      table th {
        padding: 10px 0px;
        color:  #708090;
        white-space: nowrap;        
      }

      table td {
        padding: 12px 0px;
        text-align: center;
      }
      .text{
        text-align: left;
        font-size: 12px;
      }

      footer {
        color: #5D6975;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #C1CED9;
        padding: 8px 0;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header class="clearfix">
    <div id="logo">
        <img src="{{ public_path('images/GobernacionLogo.png') }}">
    </div>
        <h4>
          <b>
            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA
          </b><br>
          ALMACEN CENTRAL
          <br>
          REPORTE POR AREAS DE LOS CONSUMOS DIRECTOS
        </h4>
        <div class="card-body">
          <p><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</p>
          <p><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</p>
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
      @php
        $TotalMonto = 0.00;
      @endphp
      @foreach($areas as $Area)
        <table style="margin-bottom: 30px;" class="text-left">
          <tr>
            <th colspan="6" style="text-align: center; padding: 10px 0px; background-color: #e0e0e0">Area: {{$Area->NOM_AREA}}</th>
          </tr>
          <tbody>
            
            @foreach($Area->ConsumoDirectos as $indexA=>$consumo)
              <tr class="tr-consumos">
                <td style="background-color: #e0e0e0;vertical-align: top;" rowspan="2" colspan="2">COSUMO DIRECTO: </td>
                <td style="background-color: #e0e0e0">FECHA</td>
                <td style="background-color: #e0e0e0">CODIGO</td>
                <td style="background-color: #e0e0e0">NRO COMPRA</td>
                <td style="background-color: #e0e0e0">NRO PREVENTIVO</td>
              </tr>
              <tr>
                <td>{{$consumo->FECHA}}</td>
                <td>{{$consumo->COD_CONSUMO_DIRECTO}}</td>
                <td>{{$consumo->NRO_ORD_COMPRA}}</td>
                <td>{{$consumo->NRO_PREVENTIVO}}</td>
              </tr>
              @php
                $SubTotal =  0.00;
                $Total =  0.00;
              @endphp
              <tr>
                <td style="background-color: #e0e0e0; vertical-align: top; text-align: right;" rowspan="{{count($consumo->Articulos)+1}}">Articulos del consumo directo: </td>
                <td style="background-color: #e0e0e0">Nombre</td>
                <td style="background-color: #e0e0e0">Medida</td>
                <td style="background-color: #e0e0e0">Cantidad</td>
                <td style="background-color: #e0e0e0">Precio U.</td>
                <td style="background-color: #e0e0e0">Total</td>
              </tr>
              @foreach($consumo->Articulos as $articulo)
                <tr>
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
                <td>Total</td>
                <td>BS/ {{number_format($Total, 2, '.', '')}}</td>
              </tr>
              <tr>
                <td colspan="6">&#160;</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endforeach
      
      <div>
        <div>Monto Total:Bs/ {{ number_format($TotalMonto, 2, '.', '') }}</div>
        {{-- <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div> --}}
      </div><br><br>
      <div class="card-body">
        <p><strong>Firma:</strong>___________________________</p>
        <p><strong>Fecha y Hora: </strong>{{ $mytime->format('d-m-Y H:i:s')}}</p>
      </div> 
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>