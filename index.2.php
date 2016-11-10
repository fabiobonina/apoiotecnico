
<?php
	function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}

    $oats = new Oats();
    $usuarios = new Usuarios();
    $clientes = new Clientes();
    $localidades = new Localidades();
    $sistemas = new Sistemas();
    $servicos = new Servicos();
    $descricoes = new Descricoes();
    $ativos = new Ativos();



      $cont_local = 0;
      $cont_localLat = 0;

      foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
        
        $cont_local++;
        if( $value->latitude <> 0){
          $cont_localLat++;
        }

      }endforeach;
    ?>



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>
    <script type="text/javascript">
      google.charts.load("upcoming", {packages:["map"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name'],
          [37.4232, -122.0853, 'Work'],
          [37.4289, -122.1697, 'University'],
          [37.6153, -122.3900, 'Airport'],
          [37.4422, -122.1731, 'Shopping']
        ]);

        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {
          showTooltip: true,
          showInfoWindow: true
        });
      }

    </script>
  </head>

  <body>
    <div id="map_div" style="width: 400px; height: 300px"></div>
  </body>
</html>
         