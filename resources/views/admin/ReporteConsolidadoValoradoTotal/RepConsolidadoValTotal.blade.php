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
        font-size: 2.4em;
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
        text-align: right;
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
        <h1><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b>
            UNIDAD DE ALMACENES CENTRAL<br>
            REPORTE CONSOLIDADO VALORADO TOTAL
        </h1>

    </header>
    <main>
     @foreach($partidas as $partida)
        @php
          $SubTotalC =  0.00;
          $totalito =  0.00;
          $SubTotalS =  0.00;
          $Total =  0.00;
        @endphp 
        <table style="margin-bottom: 30px;">
          <thead>
            <tr>
              <th colspan="5" style="text-align: center; padding: 10px 0px; background-color: #e0e0e0">Partida: {{$partida->NRO_PARTIDA}}</th>
            </tr>
            <tr>
              <th>PARTIDA PRESUPUESTARIA</th>
              <th>INGRESOS VALORADOS</th>
              <th>EGRESOS VALORADOS</th>
              <th>SALDO ACTUAL</th>
            </tr>
          </thead>
          <tbody>
            @foreach($partida->Articulos as $index=>$articulo)
              @foreach($articulo->ComprasStocks as $compra)
                @foreach($articulo->Salidas as $salida)
                  {{-- {{ $salida->pivot }} --}}
                  <tr>
                    <td class="inf">{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
                    {{-- <td class="inf">{{$articulo->CANT_ACTUAL}}</td> --}}
                    {{-- <td class="inf">{{$compra->pivot->PRECIO_UNITARIO}}</td> --}}
                    @php
                        $SubTotalC =  $compra->pivot->CANTIDAD * $compra->pivot->PRECIO_UNITARIO;
                    @endphp
                    @php
                        $SubTotalS =  $salida->pivot->CANTIDAD *$compra->pivot->PRECIO_UNITARIO;
                    @endphp
                    @php
                      $totalito = $SubTotalC-$SubTotalS;
                    @endphp
                    @php
                      $Total+=$totalito;
                    @endphp
                    <td class="inf">bs/ {{number_format($SubTotalC, 2, '.', '')}}</td>
                    <td class="inf">bs/ {{number_format($SubTotalS, 2, '.', '')}}</td>
                    <td class="inf">bs/ {{number_format($totalito, 2, '.', '')}}</td>
                    {{-- <td class="inf">bs/ {{number_format($Total, 2, '.', '')}}</td> --}}
                  </tr>
                @endforeach
              @endforeach
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
      
      <div>
        <div>Consolidado valorado Total:</div>
      </div>
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija.
    </footer>
  </body>
</html>