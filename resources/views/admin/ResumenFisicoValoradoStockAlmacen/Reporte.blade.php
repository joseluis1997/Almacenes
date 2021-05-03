<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RFVC</title>
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
            REPORTE FISICO VALORADO STOCK ALMACEN
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
        $TotalIngresos =  0.00;
        $TotalEgresos =  0.00;
      @endphp
      @foreach($partidas as $partida)
        @php
          $SubTotalIngresos =  0.00;
          $SubTotalEgresos =  0.00;
          $SubTotal =  0.00;
        @endphp
        <table>
          <thead>
            <tr>
              <th colspan="9" width="50%">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
            </tr>
            <tr style="background-color: #e0e0e0">
              <th colspan="3"></th>
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
                $PrecioPonderado =  0.00;
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
                <td>{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
                <td>{{$articulo->NOM_ARTICULO}}</td>
                <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
                <td>
                  {{number_format($Total_cant_DCS, 2, '.', '')}}
                </td>
                <td>
                  {{number_format($Total_cant_SAL, 2, '.', '')}}
                </td>
                <td>
                  {{number_format($Total_cant_DCS - $Total_cant_SAL, 2, '.', '')}}
                </td>
                <td>
                  {{number_format($Total_cant_DCS*$PrecioPonderado, 2, '.', '')}}
                </td>
                <td>
                  {{number_format($Total_cant_SAL*$PrecioPonderado, 2, '.', '')}}
                </td>
                <td>
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
              <td colspan="5"></td>
              <td>Total: </td>
              <td>
                {{number_format($SubTotalIngresos, 2, '.', '')}}
              </td>
              <td>
                {{number_format($SubTotalEgresos, 2, '.', '')}}
              </td>
              <td>
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
            Total Ingresos: <b>Bs/ {{number_format($TotalIngresos, 2, '.', '')}}</b>
          </p>
          <p>
            Total Egresos: <b>Bs/ {{number_format($TotalEgresos, 2, '.', '')}}</b>
          </p>
          <p>
            Total Monto: <b>Bs/ {{number_format($TotalMonto, 2, '.', '')}}</b>
          </p>
        </div>
      </div>
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