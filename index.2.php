<<<<<<< HEAD
<?php $oats = new Oats();
      $usuarios = new Usuarios();
      $clientes = new Clientes();
      $localidades = new Localidades();
      $sistemas = new Sistemas();
      $servicos = new Servicos();
      $descricoes = new Descricoes();
      $ativos = new Ativos();

?>


=======
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
>>>>>>> origin/master
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Circles</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>

         <?php
         $cont_oatLat = 0;
         foreach($localidades->findAll() as $key => $value):if($value->ativo == 0 ) {
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

         <?php
            $cont_oatLat++;
            } 
            }endforeach;
            $cont_oatLat1 = ($cont_oatLat / $cont_oat)*100;
            ?>

    <script>

// This example creates circles on the map, representing populations in North
// America.

// First, create an object containing LatLng and population for each city.

            var citymap = {
            chicago: {
              center: {lat: 41.878, lng: -87.629},
              population: 2714856
            },
            newyork: {
              center: {lat: 40.714, lng: -74.005},
              population: 8405837
            },
            losangeles: {
              center: {lat: 34.052, lng: -118.243},
              population: 3857799
            },
            vancouver: {
              center: {lat: 49.25, lng: -123.1},
              population: 603502
            }
          };




function initMap() {
  // Create the map.
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: {lat: 37.090, lng: -95.712},
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
      radius: Math.sqrt(citymap[city].population) * 100
    });
  }
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD690bEo7B-V4nQR5T8-aiyf61bbGzrL6Q&callback=initMap"></script>
  </body>
</html>