<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RFVCD</title>
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
        <h4><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
            ALMACEN CENTRAL<br>
            REPORTE FISICO VALORADO CONSUMOS DIRECTOS
        </h4>
        <div class="card-body">
          <p>
            <b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</p>
          <p>
            <b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</p>
        </div>
    </header>
      @php
        $TotalMonto = 0.00;
      @endphp
      @foreach($partidas as $partida)
        @php
          $SubTotal =  0.00;
          $Total =  0.00;
        @endphp
        <table>
          <thead>
            <tr>
               <th colspan="7">
                Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}
              </th>
            </tr>
            <tr style="padding: 10px 0px; background-color: #e0e0e0">
              <th colspan="3"></th>
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
                <td>{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
                <td>{{$articulo->NOM_ARTICULO}}</td>
                <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
                <td>{{$articulo->total_cantidad}}</td>
                <td>{{$articulo->total_cantidad}}</td>
                <td>Bs/ {{ number_format($articulo->total, 2, '.','')}}</td>
                <td>Bs/ {{number_format($articulo->total, 2, '.', '')}}</td>
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
        </div><br><br>
        <div class="card-body">
          <p><strong>Firma:</strong>___________________________</p>
          <p><strong>Fecha y Hora: </strong>{{ $mytime->format('d-m-Y H:i:s')}}</p>
        </div>
      </div>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>