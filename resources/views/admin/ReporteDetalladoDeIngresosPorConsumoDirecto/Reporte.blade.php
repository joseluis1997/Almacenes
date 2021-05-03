<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RDCD</title>
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
          REPORTE DETALLADO CONSUMOS DIRECTOS
        </h4>
         <div class="card-body">
          <p>
            <b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</p>
          <p>
            <b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</p>
        </div>
    </header>
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
        <table>
          <tr>
            <th colspan="10" style="background-color: #e0e0e0">
              Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}
            </th>
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
                  <td>{{$consumo->FECHA}}</td>
                  <td>{{$consumo->COD_CONSUMO_DIRECTO}}</td>
                  <td>{{$consumo->NRO_PREVENTIVO}}</td>
                  <td>{{$consumo->Area->NOM_AREA}}</td>
                  <td>{{$partida->NRO_PARTIDA}} - {{$indexA+1}}</td>
                  <td>{{$articulo->NOM_ARTICULO}}</td>
                  <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
                  <td>{{number_format($consumo->pivot->CANTIDAD, 2, '.', '')}}</td>
                  <td>{{number_format($consumo->pivot->PRECIO_UNITARIO, 2, '.', '')}}</td>
                  @php
                    $SubTotal =  $consumo->pivot->CANTIDAD * $consumo->pivot->PRECIO_UNITARIO;
                    $Total =  $Total+$SubTotal;
                  @endphp
                  <td>{{number_format($SubTotal, 2, '.', '')}}</td>
                </tr>
              @endforeach
              <tr>
                <td colspan="7">&#160;</td>
                <td>Total</td>
                <td>&#160;</td>
                <td>BS/ {{number_format($Total, 2, '.', '')}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @php
          $Total = 0;
        @endphp
      @endforeach
      <br><br>
      <div class="card-body">
        <p><strong>Firma:</strong>___________________________</p>
        <p><strong>Fecha y Hora: </strong>{{ $mytime->format('d-m-Y H:i:s')}}</p>
      </div>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>