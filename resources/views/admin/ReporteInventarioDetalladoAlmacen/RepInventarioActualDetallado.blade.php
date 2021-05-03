<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RepDetInvAct</title>
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
        <h4><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b>
            ALMACEN CENTRAL<br>
            INVENTARIO ACTUAL DETALLADO
        </h4>
        <div class="card-body">
            <p>
              <strong>Reporte Generado por el Usuario:</strong> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}
            </p>
            <p>
              <strong>Fecha y Hora:</strong> {{ $mytime->format('d-m-Y H:i:s')}}
            </p>
        </div>
    </header>
      <div>
        {{-- @if($partida_ok)
        <p>
          <b>PARTIDA: </b> {{$partida}}
        </p>
        @endif --}}
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
        <table>
          <thead>
            <tr>
              <th colspan="6">Partida: {{$partida->NRO_PARTIDA}}|{{$partida->NOM_PARTIDA}}
              </th>
            </tr>
            <tr>
              <td colspan="6" class="text"><strong>Descripcion:</strong>{{$partida->DESCRIPCION}}</td>
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
      <br><br>
      <div class="card-body">
        <p><b>Firma:_______________________</p>
        <p><b>Fecha y Hora: </b>{{ $mytime->format('d-m-Y H:i:s')}}</p>
      </div>
  {{--     <div>
        <div>Articulos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div> --}}
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>