<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
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
            INVENTARIO ACTUAL DE ALMACEN
        </h1>

    </header>
    <main>
      @php
        $Catidad =  0;
        $CatidadTotal =  0;
        $SubTotal =  0;
        $Total =  0;
      @endphp
      @foreach($partidas as $partida)
        <table style="margin-bottom: 30px;">
          <thead>
            <tr>
              <th colspan="5" style="text-align: center; padding: 10px 0px; background-color: #e0e0e0">Partida: {{$partida->NRO_PARTIDA}}</th>
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
                $CatidadTotal = $articulo->CANT_ACTUAL;
                $SubTotal = 0;
              @endphp
              @foreach($articulo->ComprasStocks as $compra)
                @if($CatidadTotal > $compra->pivot->CANTIDAD)
                  @php
                    $SubTotal = $SubTotal+($compra->pivot->CANTIDAD * $compra->pivot->PRECIO_UNITARIO);
                    $CatidadTotal = $CatidadTotal - $compra->pivot->CANTIDAD;
                  @endphp
                @elseif($compra->pivot->CANTIDAD == $CatidadTotal)
                  @php
                    $SubTotal = $SubTotal+($compra->pivot->CANTIDAD * $compra->pivot->PRECIO_UNITARIO);
                  @endphp
                  @break
                @else
                  @php
                    $SubTotal = $SubTotal+($CatidadTotal * $compra->pivot->PRECIO_UNITARIO);

                  @endphp
                  @break
                @endif
              @endforeach
              <tr>
                <td class="inf">{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
                <td class="inf">{{$articulo->NOM_ARTICULO}}</td>
                <td class="inf">{{$articulo->CANT_ACTUAL}}</td>
                <td class="inf">{{$articulo->Medida->NOM_MEDIDA}}</td>
                @php
                  $Total = $Total + $SubTotal;
                @endphp
                <td class="inf">bs/ {{number_format($SubTotal, 2, '.', '')}}</td>
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
      
      <div>
        <div>Articulos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div>
    </main>
  </body>
</html>