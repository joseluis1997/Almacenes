<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RCVT</title>
    <link rel="stylesheet" href="style.css" media="all" />
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
        float: left;
      }

      #project span {
        color: #5D6975;
        text-align: right;
        width: 52px;
        margin-right: 10px;
        display: inline-block;
        font-size: 0.8em;
      }

      #company {
        float: right;
        text-align: right;
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
        text-align: left;
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
            REPORTE CONSOLIDADO VALORADO TOTAL
        </h1>

    </header>
    <main>
      <table style="margin-bottom: 30px;" border="1">
        <thead>
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
              <td>
                {{$partida->NRO_PARTIDA}}
              </td>
              <td>{{number_format($TotalIngresos, 2, '.', '')}}</td>
              <td>{{number_format($TotalSalidas, 2, '.', '')}}</td>
              <td>{{number_format($TotalPartida, 2, '.', '')}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>      
      <div>
        <div>Consolidado valorado Total: {{number_format($Total, 2, '.', '')}} Bs.</div>
      </div>
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija.
    </footer>
  </body>
</html>