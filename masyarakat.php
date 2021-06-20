<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">

    <title>Peta Persebaran Virus COVID-19</title>
    <link rel="stylesheet" href="assets_leaflet/leaflet.css" type="text/css">
    <script src="assets_leaflet/leaflet.js" type="text/javascript"></script>  
    <script src="assets_leaflet/leaflet.ajax.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets_leaflet/easy-button.css" type="text/css">
    <script src="assets_leaflet/easy-button.js" type="text/javascript"></script>

  </head>
  <body>
    <h2>Peta Persebaran Virus COVID-19</h2>
    <div id="map" style="height: 90%; width: 95%; margin: auto;"></div>
    <script type="text/javascript">

      var map = L.map('map').setView([-1.329330, 118.281142], 5.5);
      var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {});

      var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
          maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3']
      });

      osm.addTo(map);
      
      var baseMaps = {
        "OpenStreetMap": osm,
        "Google Street":googleStreets,
        "Google Satellite": googleSat,
        "googleHybrid":googleHybrid
      };

      var myIcon = L.icon({
        iconUrl: '../icons/libraries.png',
        iconSize: [30, 40],
        iconAnchor: [15, 40],
      }); 

      var ctEasybtn=L.easyButton(' <span>&target;</span>',
      function() {
        map.locate({setView : true})
      });
      ctEasybtn.addTo(map);

      map.on('locationfound', function(e){
        L.circle(e.latlng,{radius:e.accuracy/2}).addTo(map)
        L.circleMarker(e.latlng).addTo(map)
      });


      var kabupaten = L.geoJson.ajax('geojson/indonesia_kab.geojson').addTo(map);

      var overlayMaps = {"Kabupaten": kabupaten };
      

      L.control.layers(baseMaps, overlayMaps).addTo(map);
    </script>

  </body>
</html>