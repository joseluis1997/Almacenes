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
      tr.tr-articulos > td{
        background-color: #cbd7e2 !important;
      }
      tr.tr-consumos > td{
        background-color: #F5F5F5 !important;
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
          UNIDAD DE ALMACENES CENTRAL
          <br>
          REPORTE POR AREAS DE LAS SALIDAS
        </h1>
    </header>
    <main>
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
                <td style="vertical-align: top;" rowspan="2">Salida: </td>
                <td>FECHA</td>
                <td>CODIGO SALIDA</td>
                <td>CODIDO PEDIDO</td>
              </tr>
              <tr class="tr-consumos">
                <td>{{$salida->FECHA}}</td>
                <td>{{$salida->COD_SALIDA}}</td>
                <td>{{$salida->COD_PEDIDO}}</td>
              </tr>
              <tr class="tr-articulos">
                <td style="vertical-align: top; text-align: right;" rowspan="{{count($salida->Articulos)+1}}">Articulos de la salida: </td>
                <td>Nombre</td>
                <td>Medida</td>
                <td>Cantidad</td>
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
      
      <div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div>
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>