<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RFVCD</title>
    <style type="text/css">
      .clearfix:after {
        content: "";
        display: table;
        clear: both;
      }

      a {
        color: #5D6975;
        text-decoration: underline;
      }

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

      h1 {
        border-top: 1px solid  #5D6975;
        border-bottom: 1px solid  #5D6975;
        color: #5D6975;
        font-size: 2.0em;
        line-height: 1.4em;
        font-weight: normal;
        text-align: center;
        margin: 0 0 20px 0;
        background: url(dimension.png);
      }

      #project {
        float: center;
      }

      #project span {
        color: #5D6975;
        text-align: center;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
      }

      #company {
        float: right;
        text-align: center;
      }

      #project div,
      #company div {
        white-space: nowrap;        
      }

      table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
      }

      table tr:nth-child(2n-1) td {
        background: #F5F5F5;
      }

      table th,
      table td {
        text-align: center;
      }

      table th {
        padding: 5px 0px;
        color: #5D6975;
        border-bottom: 1px solid #C1CED9;
        white-space: nowrap;        
        font-weight: normal;
      }

      table .inf,
      table .desc {
        text-align: center;
      }

      table td {
        padding: 20px 0px;
        text-align: center;
      }

      table td.service,
      table td.desc {
        vertical-align: top;
      }

      table td.unit,
      table td.qty,
      table td.total {
        font-size: 1.2em;
      }

      table td.grand {
        border-top: 1px solid #5D6975;;
      }

      #notices .notice {
        color: #5D6975;
        font-size: 1.2em;
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
        <h1><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
            ALMACEN CENTRAL<br>
            REPORTE FISICO VALORADO STOCK ALMACEN
        </h1>

    </header>
    <main>
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
        <table style="margin-bottom: 40px;" border="1">
          <thead>
            <tr style="background-color: #e0e0e0">
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
                <td class="inf">
                  {{number_format($Total_cant_DCS*$PrecioPonderado, 2, '.', '')}}
                </td>
                <td class="inf">
                  {{number_format($Total_cant_SAL*$PrecioPonderado, 2, '.', '')}}
                </td>
                <td class="inf">
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
              <td class="inf">Total: </td>
              <td class="inf">
                {{number_format($SubTotalIngresos, 2, '.', '')}}
              </td>
              <td class="inf">
                {{number_format($SubTotalEgresos, 2, '.', '')}}
              </td>
              <td class="inf">
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
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>