<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RFVCD</title>
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
            REPORTE FISICO VALORADO CONSUMOS DIRECTOS
        </h1>
        <div class="card-body">
          <h5><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</h5>
          <h5><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</h5>
        </div>
    </header>
    <main>
      @php
        $TotalMonto = 0.00;
      @endphp
      @foreach($partidas as $partida)
        @php
          $SubTotal =  0.00;
          $Total =  0.00;
        @endphp
        <table style="margin-bottom: 30px;" border="1">
          <thead>
            <tr style="padding: 10px 0px; background-color: #e0e0e0">
              <th colspan="3" >Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}</th>
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
                <td class="inf">{{$partida->NRO_PARTIDA}} - {{$index+1}}</td>
                <td class="inf">{{$articulo->NOM_ARTICULO}}</td>
                <td class="inf">{{$articulo->Medida->NOM_MEDIDA}}</td>
                <td class="inf">{{$articulo->total_cantidad}}</td>
                <td class="inf">{{$articulo->total_cantidad}}</td>
                <td class="inf">Bs/ {{$articulo->total}}</td>
                <td class="inf">Bs/ {{$articulo->total}}</td>
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
            Total: <b> {{$TotalMonto}} </b>
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