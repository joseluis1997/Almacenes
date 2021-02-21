<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <link href="{{ asset('css/ReportesStyle.css') }}" rel="stylesheet">
  </head>
  <body>
    <header class="clearfix">
    <div id="logo">
        <img src="{{ asset('images/GobernacionLogo.png') }}">
    </div>
        <h1><b>GOBIERNO AUTONOMO DEPARTAMENTAL DE TARIJA</b>
            UNIDAD DE ALMACENES CENTRAL<br>
            INVENTARIO ACTUAL DE ALMACEN
        </h1>

    </header>
    <main>
      <table>
        <thead>
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
            <td class="inf">31110</td>
            <td class="inf">Cafe</td>
            <td class="inf">100</td>
            <td class="inf">kilo</td>
            <td class="inf">bs/100.00</td>
          </tr>
          <tr>
            <td class="inf">31120</td>
            <td class="inf">Cafe Instantaneo de 200 gramos</td>
            <td class="inf">50</td>
            <td class="inf">frasco</td>
            <td class="inf">bs 200.00</td>
          </tr>
        </tbody>
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