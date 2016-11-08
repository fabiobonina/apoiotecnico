
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

          $cont_abarar_os = 0;
          $cont_retorno = 0;
          $cont_finalizar = 0;
          $cont_concluidas = 0;

          foreach($oats->findAll() as $key => $value):if($value->ativo == 0   ) {
            
            $oatStatus = $value->status;
            if( $oatStatus == 0){
              $cont_abarar_os++;
            }elseif($oatStatus == 1){
              $cont_retorno++;
            }
            elseif($oatStatus == 2){
              $cont_finalizar++;
            }
            elseif($oatStatus == 3){
              $cont_concluidas++;
            }

          }endforeach; ?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['OAT', 'Status'],
          ['Solicitação',     <?php echo $cont_abarar_os; ?>],
          ['Aberta',      <?php echo $cont_retorno; ?>],
          ['Finalizada',  <?php echo $cont_finalizar; ?>],
          ['Concluida', <?php echo $cont_concluidas; ?>]
        ]);

        var options = {
          title: 'Status de OAT',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="donutchart" style="width: 900px; height: 500px;"></div>

  </body>
</html>