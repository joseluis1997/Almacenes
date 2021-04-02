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
    </header>
        <main>
      <table  class="default">
          <tr>
            <th>Articulo:</th>
            <th>U. Medida</th>
            <th>Partida:</th>
            <th>Ubicacion:</th>
          </tr>

          <tr>
            <td>Tonners</td>
            <td>Unidad</td>
            <td>3000</td>
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

        <tr>
          <td>2021-02-03</td>
          <td width="15%">Recursos Humanos</td>
          <td>33.50</td>
          <td>10</td>
          <td>bs 500</td>
          <td>0</td>
          <td>bs 0.00</td>
          <td>5</td>
          <td>bs 250.00</td>
        </tr>

      </table>     
</body>
</html>