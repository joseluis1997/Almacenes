<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kardex</title>
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
            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA<br>
          </b>
          	UNIDAD DE ALMACENES CENTRAL
          <br>
          	Kardex de Articulo
        </h4>
        <div class="card-body">
            <p><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</p>
            <p><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</p>
        </div>
    </header>
      <table  class="default">
          <tr>
            <th style="background-color: #e0e0e0">Articulo:</th>
            <th style="background-color: #e0e0e0">U. Medida</th>
            <th style="background-color: #e0e0e0">Partida:</th>
            <th style="background-color: #e0e0e0">Ubicacion:</th>
          </tr>

          <tr>
            <td>{{$articulo->NOM_ARTICULO}}</td>
            <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
            <td>{{$articulo->Partida->NRO_PARTIDA}} - {{$articulo->Partida->NOM_PARTIDA}}</td>
            <td>Almacen Central</td>
          </tr>
      </table><br>
      <table>
        <tr>
          <th style="background-color: #e0e0e0" rowspan="2">Fecha</th>
          <th style="background-color: #e0e0e0" width="15%" rowspan="2">Unidad Sol.</th>
          <th style="background-color: #e0e0e0" rowspan="2">Precio U.</th>
          <th style="background-color: #e0e0e0" colspan="2">Entradas</th>
          <th style="background-color: #e0e0e0" colspan="2">Salidas</th>
          <th style="background-color: #e0e0e0" colspan="2">Saldos</th>
        </tr>

        <tr>
          <th  style="background-color: #e0e0e0">Cant.</th>
          <th  style="background-color: #e0e0e0">Val.</th>
          <th  style="background-color: #e0e0e0">Cant.</th>
          <th  style="background-color: #e0e0e0">Val.</th>
          <th  style="background-color: #e0e0e0">Cant.</th>
          <th  style="background-color: #e0e0e0">Val.</th>
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
      <br><br>
      <div class="card-body">
        <p><strong>Firma:</strong>___________________________</p>
        <p><strong>Fecha y Hora: </strong>{{ $mytime->format('d-m-Y H:i:s')}}</p>
      </div> 
</body>
</html>