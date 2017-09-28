<?php 
  $iots = new Iots();
  

      $cont_oatLat = 0;
      $out = "{";

         foreach($localidades->findAll() as $key => $value):{
            $localId = $value->id;
            $localidade = $value->loja . " | " . $value->nome;
            $localLat = $value->latitude;
            $localLong = $value->longitude;
            $cont_oatTt = 0;

            foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->localidade == $localId && $value->status < 5 ) {
              $cont_oatTt++;
            }endforeach;

            if( $cont_oatTt > 0 && $localLat <> 0){
          		if ($out != "{") {
          			$out .= ",";
          		}
              $out .= '"'.$localidade.'": { ';
          		$out .= 'center: {lat: '.$localLat.', ';
          		$out .= 'lng: '.$localLong.'},';
              $out .= 'atendimento: '.$cont_oatTt.'}';
            }
          }endforeach;

    		$out .= "}";

        $cont_oatLat1 = ($cont_oatLat / $cont_oat)*100;

   ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q" type="text/javascript"></script>


    <script type="text/javascript">

      // Load Charts and the corechart and barchart packages.
      google.charts.load('current', {'packages':['corechart','bar','map','geochart']});
      // Draw the pie chart and bar chart when Charts is loaded.
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawStacked);
      google.charts.setOnLoadCallback(drawChartMap);
      google.charts.setOnLoadCallback(drawMarkersMap);

      function drawChart() {
        //#### OAT Status #######
        var data2 = google.visualization.arrayToDataTable([
          ['OAT', 'Status'],
          ['Solicitação',     <?php echo $cont_anarar_os; ?>],
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

      }
      function drawStacked() {
        //#### OAT x Tecnico #######
        var data1 = new google.visualization.arrayToDataTable([
          ['Tecnico', 'OAT Solicitada', 'OAT Aberta'],
          <?php foreach($usuarios->findAll() as $key => $value):if($value->ativo == 0   ) {
          $usuario = $value->nickuser;
          $cont_userOatSol = 0;
          $cont_userOatAb = 0;
            foreach($oats->findAll() as $key => $value):if($value->ativo == 0  && $value->nickuser == $usuario  ) {
              if( $value->status == 0){
                $cont_userOatSol++;
              }
              if( $value->status == 1){
                $cont_userOatAb++;
              }
            }endforeach;
            if($cont_userOatAb > 0 OR $cont_userOatSol > 0){?>
              ["<?php echo $usuario; ?>", <?php echo $cont_userOatSol; ?>, <?php echo $cont_userOatAb; ?>],
          <?php }
            }endforeach; ?>
        ]);
        var barchart_options = {
        title: 'OAT x Tecnico',
        chartArea: {width: '50%'},
        isStacked: true,
        hAxis: {
          title: 'Total OAT',
          minValue: 0,
        },
        vAxis: {
          title: 'Tecnico'
        }
        };
        var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
        barchart.draw(data1, barchart_options);

      }
      //#### GeoLocalização #######
      function drawChartMap() {
        var data_maps = google.visualization.arrayToDataTable([
          ['Lat', 'Long', 'Name'],
          <?php foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
            $localidade = $value->loja . " | " . $value->nome;
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


       <body class="nav-md">
       <div class="container body">
      <div class="main_container">

      <!-- component template -->
<script type="text/x-template" id="grid-template">
  <table>
    <thead>
      <tr>
        <th v-for="key in columns"
          @click="sortBy(key)"
          :class="{ active: sortKey == key }">
          {{ key | capitalize }}
          <span class="arrow" :class="sortOrders[key] > 0 ? 'asc' : 'dsc'">
          </span>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="entry in filteredData">
        <td v-for="key in columns">
          {{entry[key]}}
        </td>
      </tr>
    </tbody>
  </table>
</script>

<!-- demo root element -->
<div id="demo">
  <form id="search">
    Search <input name="query" v-model="searchQuery">
  </form>
  <demo-grid
    :data="gridData"
    :columns="gridColumns"
    :filter-key="searchQuery">
  </demo-grid>
</div>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
              <div class="col-md-12">
          <div class="row">
            <?php
          foreach($lojas->findAll() as $key => $value):if($value->ativo == 0 ) {
            ?>

            
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i>
                </div>
                <div class="count"><?php echo $value->id; ?></div>

                <h4><a href="lojaList.php"><?php echo $value->displayName; ?></a></h4>
                <p><?php echo $value->name; ?></p>
              </div>
            </div>

            <?php
          }endforeach;
          ?>
          </div>
        </div>
        </div>

          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> Total OAT</span>
              <div class="count"><?php echo $cont_oat; ?></div>
              <span class="count_bottom"><i class="green"> </i> Ordem de Atend. Tec.</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> OAT Solicitada</span>
              <div class="count"><?php echo $cont_anarar_os; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> Aguardando OS</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> OAT Aberta</span>
              <div class="count green"><?php echo $cont_retorno; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> Retorno Tec.</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> OAT Fechada</span>
              <div class="count"><?php echo $cont_finalizar; ?></div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i> </i> Baixar no Sistema</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-wrench"></i> OAT Concluida</span>
              <div class="count"><?php echo $cont_concluidas; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa  fa-building"></i> Localidade</span>
              <div class="count"><?php echo $cont_local; ?></div>
              <span class="count_bottom"><i class="green"><i class="fa fa-map-marker"></i> <?php echo $cont_localLat; ?></i> Posição geografica</span>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>OAT <small>Status</small></h3>
                  </div>
                </div>
                <div class="col-md-5 col-sm-3 col-xs-12 bg-white">
                  <div id="piechart_div" style="width: 100%; height:100%;"></div>
                </div>
                <div class="col-md-7 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 460px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="barchart_div" style="width: 100%; height:400px;"></div>
                  </div>
                </div>


                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>OAT | Região <small>Posiçao geografica</small></h3>
                  </div>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 460px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="map" style="width: 100%; height: 460px;"></div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-12 bg-white">
                  <div style="width: 100%; height:100%;">OBS: Os atendimentos exibidos neste gráfico, são os que tem sua posição geografica salva por geolocalização, que corresponde a <?php echo round($cont_oatLat1, 2) ; ?>%( <?php echo $cont_oatLat ; ?> ) do total de atendimentos feitos.</div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br />

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>ETAs <small>Geolocalização</small></h3>
                  </div>
                </div>
                <div class="col-md-12 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 460px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">

                    <div id="map_div" style="width: 100%; height: 600px"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br />

        </div>
        </div>
        </div>
        <!-- /page content -->
        <script>
          //#### Atendimento por Região #######
          var citymap = <?php echo $out; ?>;
           function initMap() {
             // Create the map.
             var map = new google.maps.Map(document.getElementById('map'), {
               zoom: 4,
               center: {lat: -14.239104, lng: -51.925403},
               mapTypeId: google.maps.MapTypeId.TERRAIN
             });

             // Construct the circle for each value in citymap.
             // Note: We scale the area of the circle based on the population.
             for (var city in citymap) {
               // Add the circle for this city to the map.
               var cityCircle = new google.maps.Circle({
                 strokeColor: '#FF0000',
                 strokeOpacity: 0.8,
                 strokeWeight: 2,
                 fillColor: '#FF0000',
                 fillOpacity: 0.35,
                 map: map,
                 center: citymap[city].center,
                 radius: Math.sqrt(citymap[city].atendimento) * 5000
               });
             }
           }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q&callback=initMap">
        </script>
