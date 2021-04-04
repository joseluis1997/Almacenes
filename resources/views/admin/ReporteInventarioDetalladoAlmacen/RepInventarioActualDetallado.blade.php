<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RepDetInvAct</title>
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
        font-size: 2em;
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
        <h1><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b>
            ALMACEN CENTRAL<br>
            INVENTARIO ACTUAL DETALLADO
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
        <table style="margin-bottom: 30px;" border="1">
          <thead>
            <tr>
              <th colspan="6" style="text-align: left; padding: 10px 0px; background-color: #e0e0e0">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
            </tr>
            <tr>
              <th>NRO</th>
              <th>ITEM</th>
              <th colspan="3">NOMBRE</th>
              <th>MEDIDA</th>
            </tr>
          </thead>
          <tbody>
            @foreach($partida->Articulos as $indexA=>$articulo)
              <tr class="text-center">
                <td>{{$indexA+1}}</td>
                <td>{{$partida->NRO_PARTIDA}} - {{$indexA+1}}</td>
                <td colspan="3">{{$articulo->NOM_ARTICULO}}</td>
                <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
              </tr>
              <tr>
                <td colspan="3">&#160;</td>
                <td style="background-color: #c1ced9;">Cantidad</td>
                <td style="background-color: #c1ced9;">Precio Unitario</td>
                <td style="background-color: #c1ced9;">Total</td>
              </tr>
              @php
                $SubTotal =  0.00;
                $Total =  0.00;
              @endphp
              @foreach($articulo->ComprasStocks as $compra)
                <tr style="text-align: center;">
                  <td colspan="3">&#160;</td>
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
                <td colspan="3">&#160;</td>
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
      
  {{--     <div>
        <div>Articulos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div> --}}
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>