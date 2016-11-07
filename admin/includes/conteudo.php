<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("upcoming", {packages:["map"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          

          ['Lat', 'Long', 'Name'],
          <?php foreach($localidades->findAll() as $key => $value): ?>
          [<?php echo $value->latitude; ?>, <?php echo $value->longitude; ?>, '<?php echo $value->municipio; ?>'],
          <?php endforeach; ?>
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