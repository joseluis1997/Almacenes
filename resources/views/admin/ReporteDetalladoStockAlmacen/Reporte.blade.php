<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RepDeCom</title>
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
      }

      .text-center td {
        text-align: center !important;
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
        <h1>
          <b>
            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA
          </b>
          ALMACEN CENTRAL
          <br>
          REPORTE DETALLADO DE COMPRAS
        </h1>
    </header>
    <main>
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
        <table style="margin-bottom: 30px;" class="text-left">
          <tr>
            <th colspan="10" style="text-align: left; padding: 10px 0px; background-color: #e0e0e0">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
          </tr>
          <tr>
            <th>FECHA</th>
            <th>CODIGO</th>
            <th>PREVENTIVO</th>
            <th>SOLICITANTE</th>
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
              @foreach($articulo->ComprasStocks as $compra)
                <tr>
                  <td>{{$compra->FECHA}}</td>
                  <td>{{$compra->COD_COMPRA_STOCK}}</td>
                  <td>{{$compra->NRO_PREVENTIVO}}</td>
                  <td>{{$compra->Area->NOM_AREA}}</td>
                  <td>{{$partida->NRO_PARTIDA}} - {{$indexA+1}}</td>
                  <td>{{$articulo->NOM_ARTICULO}}</td>
                  <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
                  <td>{{number_format($compra->pivot->CANTIDAD, 2, '.', '')}}</td>
                  <td>{{number_format($compra->pivot->PRECIO_UNITARIO, 2, '.', '')}}</td>
                  @php
                    $SubTotal =  $compra->pivot->CANTIDAD * $compra->pivot->PRECIO_UNITARIO;
                    $Total =  $Total+$SubTotal;
                  @endphp
                  <td>{{number_format($SubTotal, 2, '.', '')}}</td>
                </tr>
              @endforeach
              <tr>
                <td colspan="7">&#160;</td>
                <td style="background-color: #cbd7e2;">Total</td>
                <td style="background-color: #cbd7e2;">&#160;</td>
                <td style="background-color: #cbd7e2;">BS/ {{number_format($Total, 2, '.', '')}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
        @php
          $Total = 0;
        @endphp
      @endforeach
      
 {{--      <div>
        <div>Articulos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div> --}}
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>