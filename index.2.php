
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





    ?>



<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>
    <script type="text/javascript">
      google.charts.load("upcoming", {packages:["map"]});
      google.charts.setOnLoadCallback(drawChartMap);
      function drawChartMap() {
        var data_maps = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name'],
          <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localidade = $value->cliente . " | " . $value->nome;
            if( $value->latitude <> 0){
            ?>
          

          [<?php echo $value->latitude; ?>, <?php echo $value->longitude; ?>, '<?php echo $localidade; ?>'],
          <?php    }
          }endforeach; ?>
        ]);
        var options_maps = {
        showTooltip: true,
        showInfoWindow: true,
        useMapTypeControl: true,
        enableScrollWheel: true,
        mapType: 'normal',
        showLine: true,
        };
        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data_maps, options_maps);
      }

    </script>
  </head>

  <body>
    <div id="map_div" style="width: 640px; height: 480px"></div>


  </body>
</html>
         