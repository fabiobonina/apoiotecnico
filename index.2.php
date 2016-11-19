
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
            $cont_oatTt = 0;
            $municipio = $value->municipio;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId  ) {
              $cont_oatTt++;
            }endforeach;
            if( $cont_oatTt > 0){
          ?>
          <?php echo $municipio; ?> <?php echo $localidade; ?> <?php echo $cont_oatTt; ?><br/>
            <?php }
          }endforeach; ?>

<html>
  <head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
	  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>
  <script type='text/javascript'>
     google.charts.load('upcoming', {'packages': ['geochart', 'table']});
     google.charts.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      var data = google.visualization.arrayToDataTable([
        ['City',   'Population', 'Area'],
        <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localId = $value->id;
            $localidade = $value->cliente . " | " . $value->nome;
            $cont_oatTt = 0;
            $municipio = $value->municipio;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId  ) {
              $cont_oatTt++;
            }endforeach;
            if( $cont_oatTt > 0){
          ?>
        ['<?php echo $municipio; ?>',      2761477,    1285.31],
        <?php }
        }endforeach; ?>
        ['Milan',     1324110,    181.76],
        ['Naples',    959574,     117.27],
        ['Turin',     907563,     130.17],
        ['Palermo',   655875,     158.9],
        ['Genoa',     607906,     243.60],
        ['Bologna',   380181,     140.7],
        ['Florence',  371282,     102.41],
        ['Fiumicino', 67370,      213.44],
        ['Anzio',     52192,      43.43],
        ['Ciampino',  38262,      11]
      ]);

      var options = {

        displayMode: 'markers',
        colorAxis: {colors: ['green', 'blue']}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="chart_div" ></div>
  </body>
</html>
