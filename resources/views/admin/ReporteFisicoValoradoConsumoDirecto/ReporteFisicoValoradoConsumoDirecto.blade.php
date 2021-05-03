<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>RFVCD</title>
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
        <h1><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b>
            UNIDAD DE ALMACEN CENTRAL<br>
            INVENTARIO ACTUAL DE ALMACEN
        </h1>

    </header>
    <main>
        <table style="margin-bottom: 30px;">
          <thead>
            <tr>
              <th colspan="5" style="text-align: center; padding: 10px 0px; background-color: #e0e0e0">Partida</th>
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
            
              <tr>
                <td class="inf"></td>
                <td class="inf"></td>
                <td class="inf"></td>
                <td class="inf"></td>
                
                <td class="inf">bs/ </td>
              </tr>

          </tbody>
          <tfoot>
            <tr>
              <td colspan="3"></td>
              <td class="inf">Total: </td>
              <td class="inf">Bs/ </td>
            </tr>
          </tfoot>
        </table>
      <div>
        <div>Articulos:</div>
        <div >Invenatario Actual de todos los Articulos Disponibles en el Almacen de la Gobernacion</div>
      </div>
    </main>
    <footer>
      Gobierno Autonomo Departamental de Tarija
    </footer>
  </body>
</html>