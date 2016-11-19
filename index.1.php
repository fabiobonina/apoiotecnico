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
     <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localId = $value->id;
            $localidade = $value->cliente . " | " . $value->nome;
            $latitude = $value->latitude;
            $longitude = $value->longitude;
            $cont_oatTt = 0;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId  ) {
              $cont_oatTt++;
            }endforeach;
            if( $cont_oatTt > 0 && $latitude <> 0){
    ?>

    <?php echo $latitude; ?> <?php echo $longitude; ?><?php echo $localidade; ?> <?php echo $cont_oatTt; ?>
    <?php }
    }endforeach; ?>
<html>
  <head>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>
  
    <script type='text/javascript'>
     google.charts.load('upcoming', {'packages': ['geochart', 'table']});
     google.charts.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'Latitude');
        data.addColumn('number', 'Longitude');
        data.addColumn('string', 'Label');
        data.addColumn('number', 'Value 1');
        data.addRows([
         <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localId = $value->id;
            $localidade = $value->cliente . " | " . $value->nome;
            $latitude = $value->latitude;
            $longitude = $value->longitude;
            $cont_oatTt = 0;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId  ) {
              $cont_oatTt++;
            }endforeach;
            if( $cont_oatTt > 0 && $latitude <> 0){ ?>
          [<?php echo $latitude; ?>, <?php echo $longitude; ?>, '<?php echo $localidade; ?>', <?php echo $cont_oatTt; ?>],
          <?php } 
          }endforeach; ?>
        ]);

        var options = {
          region: 'BR',
          displayMode: 'markers',
          colorAxis: {colors: ['green', 'blue']}
        };


          var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        };
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>