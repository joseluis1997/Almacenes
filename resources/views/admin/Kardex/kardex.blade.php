<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kardex</title>
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
        font-weight: bold;
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
            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA<br>
          </b>
          	UNIDAD DE ALMACENES CENTRAL
          <br>
          	Kardex de Articulo
        </h1>
        <div class="card-body">
            <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
            <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
        </div>
    </header>
      <table  class="default">
          <tr>
            <th>Articulo:</th>
            <th>U. Medida</th>
            <th>Partida:</th>
            <th>Ubicacion:</th>
          </tr>

          <tr>
            <td>{{$articulo->NOM_ARTICULO}}</td>
            <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
            <td>{{$articulo->Partida->NRO_PARTIDA}} - {{$articulo->Partida->NOM_PARTIDA}}</td>
            <td>Almacen Central</td>
          </tr>
      </table><br>
      <table border="1">
        <tr>
          <th rowspan="2">Fecha</th>
          <th width="15%" rowspan="2">Unidad Sol.</th>
          <th rowspan="2">Precio U.</th>
          <th colspan="2">Entradas</th>
          <th colspan="2">Salidas</th>
          <th colspan="2">Saldos</th>
        </tr>

        <tr>
          <th>Cant.</th>
          <th>Val.</th>
          <th>Cant.</th>
          <th>Val.</th>
          <th>Cant.</th>
          <th>Val.</th>
        </tr>
        @php
          $valor_ant = 0;
          $valor_act = 0;
          $cant_ant = 0;
          $cant_act = 0;
          $costo_pond = 0;
        @endphp
        @foreach ($collections as $collection)
          @if($collection->COD_COMPRA_STOCK > 0)
            @php
              $cant_act = $collection->pivot->CANTIDAD;
              $valor_act = $collection->pivot->CANTIDAD * $collection->pivot->PRECIO_UNITARIO;
              $aux1 = $valor_ant+$valor_act;
              $aux2 = $cant_ant+$cant_act;
              $costo_pond = $aux1/$aux2;
            @endphp
            <tr>
              <td>{{$collection->FECHA}}</td>
              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
              <td>{{number_format($cant_act, 2, '.', '')}}</td>
              <td>{{number_format($valor_act, 2, '.', '')}}</td>
              <td></td>
              <td></td>
              @php
                $cant_ant = $cant_ant+$cant_act;
                $valor_ant = $cant_ant*$costo_pond;
              @endphp
              <td>{{number_format($cant_ant, 2, '.', '')}}</td>
              <td>bs {{number_format($valor_ant, 2, '.', '')}}</td>
            </tr>
          @elseif($collection->COD_SALIDA > 0)
            @php
              $cant_act = $collection->pivot->CANTIDAD;
              $valor_act = $collection->pivot->CANTIDAD * $costo_pond;
            @endphp
            <tr>
              <td>{{$collection->FECHA}}</td>
              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
              <td></td>
              <td></td>
              <td>{{number_format($cant_act, 2, '.', '')}}</td>
              <td>{{number_format($valor_act, 2, '.', '')}}</td>
              @php
                $cant_ant = $cant_ant-$cant_act;
                $valor_ant = $cant_ant*$costo_pond;
              @endphp
              <td>{{number_format($cant_ant, 2, '.', '')}}</td>
              <td>bs {{number_format($valor_ant, 2, '.', '')}}</td>
            </tr>
          @else
            <tr>
              <td>{{$collection->FECHA}}</td>
              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
              <td>{{number_format($collection->pivot->CANTIDAD, 2, '.', '')}}</td>
              <td>{{number_format(($collection->pivot->CANTIDAD * $collection->pivot->PRECIO_UNITARIO), 2, '.', '')}}</td>
              <td></td>
              <td></td>
              @php
                $aux1 = $cant_ant+$collection->pivot->CANTIDAD;
                $aux2 = $aux1*$costo_pond;
              @endphp
              <td>{{number_format($aux1, 2, '.', '')}}</td>
              <td>bs {{number_format($aux2, 2, '.', '')}}</td>
            </tr>
            <tr>
              <td>{{$collection->FECHA}}</td>
              <td width="15%">{{$collection->Area->NOM_AREA}}</td>
              <td>{{number_format($costo_pond, 2, '.', '')}}</td>
              <td></td>
              <td></td>
              <td>{{number_format($collection->pivot->CANTIDAD, 2, '.', '')}}</td>
              <td>{{number_format(($collection->pivot->CANTIDAD * $collection->pivot->PRECIO_UNITARIO), 2, '.', '')}}</td>
              @php
                $aux1 = $cant_ant;
                $aux2 = $aux1*$costo_pond;
              @endphp
              <td>{{number_format($aux1, 2, '.', '')}}</td>
              <td>bs {{number_format($aux2, 2, '.', '')}}</td>
            </tr>
          @endif
        @endforeach
      </table>     
</body>
</html>