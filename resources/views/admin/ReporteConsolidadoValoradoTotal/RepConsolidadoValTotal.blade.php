<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RCVT</title>
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
        <h4><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b><br>
            ALMACEN CENTRAL<br>
            REPORTE CONSOLIDADO VALORADO TOTAL
        </h4>
         <div class="card-body">
            <p><b>Reporte Generado por el Usuario:</b> {{auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}</p>
            <p><b>Fecha y Hora:</b> {{ $mytime->format('d-m-Y H:i:s')}}</p>
        </div>
    </header>
      <table>
        <thead>
          <tr>
            <th style="background-color: #e0e0e0">PARTIDA PRESUPUESTARIA</th>
            <th style="background-color: #e0e0e0">INGRESOS <br>VALORADOS</th>
            <th style="background-color: #e0e0e0">EGRESOS <br>VALORADOS</th>
            <th style="background-color: #e0e0e0">SALDO <br>ACTUAL</th>
          </tr>
        </thead>
        <tbody>
          @php
            $Total =  0.00;
          @endphp 
          @foreach($partidas as $partida)
            @php
              $TotalIngresos =  0.00;
              $TotalSalidas =  0.00;
              $TotalPartida =  0.00;
            @endphp 
            @foreach($partida->Articulos as $index=>$articulo)
              @php
                if($articulo->total_prec_DCS > 0){
                  $TotalIngresos +=  $TotalIngresos+$articulo->total_prec_DCS;
                }else{
                  $TotalIngresos += 0.00;
                }
                if($articulo->total_cant_DCS > 0){
                  $TotalSalidas += $articulo->total_cant_SAL*($articulo->total_prec_DCS/$articulo->total_cant_DCS);
                }else{
                  $TotalSalidas += 0.00;
                }
              @endphp
            @endforeach
            @php
              $TotalPartida +=  $TotalIngresos-$TotalSalidas;
              $Total =  $Total+$TotalPartida;
            @endphp
            <tr>
              <td style="background-color: #e0e0e0;text-align:left;" width="40%">
                <b>{{$partida->NRO_PARTIDA}}</b>|{{ $partida->NOM_PARTIDA}}
              </td>
              <td width="15%">{{number_format($TotalIngresos, 2, '.', '')}} Bs.</td>
              <td width="15%">{{number_format($TotalSalidas, 2, '.', '')}} Bs.</td>
              <td width="15%">{{number_format($TotalPartida, 2, '.', '')}} Bs.</td>
            </tr>
          @endforeach
        </tbody>
      </table>      
      <div>
        <div><b>Consolidado valorado Total:</b> {{number_format($Total, 2, '.', '')}} Bs.</div>
      </div>
      <br><br>
      <div class="card-body">
        <p><strong>Firma:</strong>___________________________</p>
        <p><strong>Fecha y Hora: </strong>{{ $mytime->format('d-m-Y H:i:s')}}</p>
      </div> 
    <footer>
      Gobierno Autonomo Departamental de Tarija.
    </footer>
  </body>
</html>