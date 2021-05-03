<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RepArSal</title>
    <link rel="stylesheet" href="style.css" media="all" />
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
            GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA
          </b><br>
          ALMACEN CENTRAL
          <br>
          REPORTE POR AREAS DE LAS SALIDAS
        </h4>
        <div class="card-body">
            <p><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</p>
            <p><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</p>
        </div>
    </header>
      <div>
        @if($area_ok)
        <p>
          <b>Area: </b> {{$area}}
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
      @foreach($areas as $Area)
        <table style="margin-bottom: 30px;" class="text-left">
          <tr>
            <th colspan="4" style="text-align: center; padding: 10px 0px; background-color: #e0e0e0">Area: {{$Area->NOM_AREA}}</th>
          </tr>
          <tbody>
            
            @foreach($Area->Salidas as $indexA=>$salida)
              <tr class="tr-consumos">
                <td style="background-color: #e0e0e0;vertical-align: top;" rowspan="2">Salida: </td>
                <td style="background-color: #e0e0e0">FECHA</td>
                <td style="background-color: #e0e0e0">CODIGO SALIDA</td>
                <td style="background-color: #e0e0e0">CODIDO PEDIDO</td>
              </tr>
              <tr class="tr-consumos">
                <td>{{$salida->FECHA}}</td>
                <td>{{$salida->COD_SALIDA}}</td>
                <td>{{$salida->COD_PEDIDO}}</td>
              </tr>
              <tr class="tr-articulos">
                <td style="background-color: #e0e0e0;vertical-align: top; text-align: right;" rowspan="{{count($salida->Articulos)+1}}">Articulos de la salida: </td>
                <td style="background-color: #e0e0e0">Nombre</td>
                <td style="background-color: #e0e0e0">Medida</td>
                <td style="background-color: #e0e0e0">Cantidad</td>
              </tr>
              @foreach($salida->Articulos as $articulo)
                <tr class="tr-articulos">
                  <td>{{$articulo->NOM_ARTICULO}}</td>
                  <td>{{$articulo->Medida->NOM_MEDIDA}}</td>
                  <td>{{number_format($articulo->pivot->CANTIDAD, 2, '.', '')}}</td>
                </tr>
              @endforeach
              <tr>
                <td colspan="6">&#160;</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endforeach
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