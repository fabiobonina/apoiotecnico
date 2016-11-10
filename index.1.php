
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

    }endforeach; 
    ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart']});
      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data1 = new google.visualization.arrayToDataTable([
          ['Tecnico', 'OAT Solicitada', 'OAT Aberta'],
          <?php
          $cont_oatAbe = 0;
          $cont_oatRet = 0;
          foreach($usuarios->findAll() as $key => $value):if($value->ativo == 0   ) {
          $usuario = $value->nickuser;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->nickuser == $usuario  ) {
              
              $oatStatus = $value->status;
              if( $oatStatus == 0){
                $cont_oatAbe++;
              }elseif($oatStatus == 1){
                $cont_oatRet++;
              }
              
            }endforeach;  
            if($cont_oat > 0){?>
              ["<?php echo $usuario; ?>", <?php echo $cont_oatAbe; ?>, <?php echo $cont_oatRet; ?>],
          <?php 
            }
          }endforeach; ?>
        ]);

        var data2 = google.visualization.arrayToDataTable([
          ['OAT', 'Status'],
          ['Solicitação',     <?php echo $cont_abarar_os; ?>],
          ['Aberta',      <?php echo $cont_retorno; ?>],
          ['Fechada',  <?php echo $cont_finalizar; ?>],
          ['Concluida', <?php echo $cont_concluidas; ?>]
        ]);

        var piechart_options = {title:'OAT Status',
                       width:450,
                       height:400,
                      pieHole: 0.4};
        var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
        piechart.draw(data2, piechart_options);

        var barchart_options = {title:'OAT Abertas X Tecnico',
          
          legend: { position: 'none' },
          chart: { title: 'OAT',
                   subtitle: 'Pendete de retorno' },
          bars: 'horizontal', // Required for Material Bar Charts.
          axes: {
            x: {
              0: { side: 'top', label: 'OAT'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data1, barchart_options);
      }
</script>
<body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="piechart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="barchart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>