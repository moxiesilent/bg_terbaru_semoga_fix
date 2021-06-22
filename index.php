<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

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
  <!-- Sidenav -->
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
                <div class="media align-items-center">
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <a href="login.php"><button type="button" class="btn btn-neutral my-4">Login</button></a>
                  </div>
                </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Peta Persebaran Virus COVID-19</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card border-0">
            <div id="map" class="map-canvas" style="height: 630px;"></div>
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

              function redZone(feature){
                return {weight:0, fillColor:"red",fillOpacity:0.5 };
              }
              function orangeZone(feature){
                return {weight:0, fillColor:"orange",fillOpacity:0.5 };
              }
              function greenZone(feature){
                return {weight:0, fillColor:"green",fillOpacity:0.5 };
              }

              var kabTermasuk = L.layerGroup([]);
              <?php
                include('koneksi.php');
                $mysqli = connectdb("localhost", "root", "","bg_uas");
                if($mysqli->connect_errno){
                  printf("Connect failed: %s\n", $mysqli->connect_error);
                  exit();
                }

                $sql = "SELECT a.id, a.nama_kab as nama, a.x, a.y, count(*) as total FROM `master_kabupaten` a inner join `penderita` b on a.id = b.master_kabupaten_id group by a.id";
                $res = $mysqli->query($sql);
                while($row = $res->fetch_assoc()){
                  if($row['total'] > 5){?>
                    var k<?php echo $row['id']?>= L.marker([ <?php echo $row['y'] ?>,<?php echo $row['x'] ?>], {style:redZone}).bindPopup("<dl><dt>Jumlah Kasus : "+ <?php echo $row['total'] ?>+"</dt></dl>");
                    kabTermasuk.addLayer(k<?php echo $row['id']?>);
              <?php
                  } else if ($row['total'] <= 5){
              ?>
                  var k<?php echo $row['id']?>= L.marker([ <?php echo $row['y'] ?>,<?php echo $row['x'] ?>], {style:orangeZone}).bindPopup("<dl><dt>Jumlah Kasus : "+ <?php echo $row['total'] ?>+"</dt></dl>");
                  kabTermasuk.addLayer(k<?php echo $row['id']?>);
              <?php
                } else {?>
                  var k<?php echo $row['id']?>= L.marker([ <?php echo $row['y'] ?>,<?php echo $row['x'] ?>], {style:greenZone}).bindPopup("<dl><dt>Kabupaten <?php echo $row['nama'] ?> +"</dt><dd>Jumlah Kasus : "+ <?php echo $row['total'] ?>+"</dd></dl>");
                  kabTermasuk.addLayer(k<?php echo $row['id']?>);
              <?php
                }
              }
              ?>
              kabTermasuk.addTo(map);

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

              var overlayMaps = {"Kabupaten": kabupaten};
              

              L.control.layers(baseMaps, overlayMaps).addTo(map);
            </script>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>