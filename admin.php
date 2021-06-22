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
<?php
  session_start();

	if (isset($_SESSION['email'])) {
		$user = $_SESSION['email'];
	}
	else{
		header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin Home</title>
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

  <link rel="stylesheet" href="assets_leaflet/leaflet.css" type="text/css">
  <script src="assets_leaflet/leaflet.js" type="text/javascript"></script>  
  <script src="assets_leaflet/leaflet.ajax.js" type="text/javascript"></script>
  <link rel="stylesheet" href="assets_leaflet/easy-button.css" type="text/css">
  <script src="assets_leaflet/easy-button.js" type="text/javascript"></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="admin.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="penderita.php">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Penderita</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="suspect.php">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Suspect</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <a href="logout.php">
                      <button class="btn btn-neutral">Logout</button>
                    </a>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <!-- Page content -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Peta Persebaran Virus COVID-19</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <!-- <a href="addpenderita.php" class="btn btn-sm btn-neutral">Tambah Data Penderita Covid</a> -->

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#exampleModal">
                Tambah Data Penderita Covid
              </button>

              <!-- Modal Tambah-->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah data penderita covid</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="addpenderita.php" method="POST">
                    <div class="modal-body">
                      
                        <div class="form-group text-left">
                          <label for="ktp">KTP / NIK</label>
                          <input type="text" class="form-control" id="ktp" placeholder="123456789" name="ktp" required>
                        </div>
                        <div class="form-group text-left">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" placeholder="John Doe" name="nama" required>
                        </div>
                        <div class="form-group text-left">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" placeholder="Jl. Kenangan no.50, Kertajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60282" name="alamat" required>
                        </div>
                        <div class="form-group text-left">
                          <label for="lokasikarantina">Lokasi Karantina</label>
                          <input type="text" class="form-control" id="lokasikarantina" placeholder="Asrama Haji Surabaya" name="lokasikarantina" required>
                        </div>
                        <div class="form-group text-left">
                          <label for="keluhan">Keluhan Sakit</label>
                          <input type="text" class="form-control" id="keluhan" placeholder="tidak bisa mearasakan makanan, pusing, demam" name="keluhan">
                        </div>
                        <div class="form-group text-left">
                          <label for="riwayat">Riwayat Perjalanan</label>
                          <input type="text" class="form-control" id="riwayat" placeholder="surabaya - madura" name="riwayat">
                        </div>
                        <div class="form-group text-left">
                          <label>Jenis Pasien</label>
                          <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="penderita" name="jenis" class="custom-control-input" value="penderita">
                            <label class="custom-control-label" for="penderita">Penderita</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="suspect" name="jenis" class="custom-control-input" value="suspect">
                            <label class="custom-control-label" for="suspect">Suspect</label>
                          </div>
                          <br>
                          <div class="form-group text-left">
                          <label for="kabupaten">Example select</label>
                          <select class="form-control" id="kabupaten" name="kabupaten">

                            <?php
                            include('koneksi.php');

                            $mysqli = connectdb("localhost", "root", "","bg_uas");
                            if($mysqli->connect_errno){
                              printf("Connect failed: %s\n", $mysqli->connect_error);
                              exit();
                            }

                            $sql = "SELECT * FROM master_kabupaten";
                            $result = $mysqli->query($sql);
                            while($row = $result->fetch_assoc()){
                              echo "<option>";
                              echo $row['nama_kab'];
                              echo "</option>";
                            }
                            
                            ?>
                          </select>
                        </div>
                        </div>
                        <div class="form-group text-left">
                          <label for="x">Lokasi koordinat X</label>
                          <input type="text" class="form-control" id="x" placeholder="112.759989" name="x">
                        </div>
                        <div class="form-group text-left">
                          <label for="y">Lokasi koordinat Y</label>
                          <input type="text" class="form-control" id="y" placeholder="-7.279482" name="y">
                        </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" name="submit" value="Tambah Data" class="btn btn-primary">
                    </div>
                    </form>
                  </div>
                </div>
              </div>
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
            <div id="map" class="map-canvas" style="height: 600px;"></div>
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

              var penderitaIcon = L.icon({
              iconUrl: 'icons/health-medical.png',
              iconSize: [30, 40],
              iconAnchor: [15, 40],
              });

              var susIcon = L.icon({
              iconUrl: 'icons/meetups.png',
              iconSize: [30, 40],
              iconAnchor: [15, 40],
              }); 

              var ctEasybtn=L.easyButton(' <span>&target;</span>',
              function() {
                map.locate({setView : true})
              });
              ctEasybtn.addTo(map);

              map.on('locationfound', function(e){
                L.circle(e.latlng,{radius:e.accuracy/200}).addTo(map)
                L.circleMarker(e.latlng).addTo(map)
              });

              var penderitas = L.layerGroup([]);
              var suspects = L.layerGroup([]);

              <?php
              $sql = "SELECT * FROM penderita";
              $result = $mysqli->query($sql);
              while($row = $result->fetch_assoc()){
                  if($row['jenis'] == 'penderita'){?>
                  var penderita<?php echo $row['id']?> = L.marker([<?php echo $row['y'] ?>, <?php echo $row['x'] ?>], {icon:penderitaIcon}).bindPopup("<dl><dt>Nama <?php echo $row['nama'] ?></dt><dd>KTP : <?php echo $row['ktp'] ?></dd><dd>Alamat : <?php echo $row['alamat'] ?></dd><dd>Lokasi Karantina : <?php echo $row['lokasi_karantina'] ?></dd><dd>Keluhan : <?php echo $row['keluhan_sakit'] ?></dd><dd>Riawayat Perjalanan : <?php echo $row['riwayat_perjalanan'] ?></dd><dd>Status : <?php echo $row['jenis'] ?></dd></dl>");
                  penderitas.addLayer(penderita<?php echo $row['id']?>);
              <?php
                  }else{?>
                  var suspect<?php echo $row['id']?> = L.marker([<?php echo $row['y'] ?>, <?php echo $row['x'] ?>], {icon:susIcon}).bindPopup("<dl><dt>Nama <?php echo $row['nama'] ?></dt><dd>KTP : <?php echo $row['ktp'] ?></dd><dd>Alamat : <?php echo $row['alamat'] ?></dd><dd>Lokasi Karantina : <?php echo $row['lokasi_karantina'] ?></dd><dd>Keluhan : <?php echo $row['keluhan_sakit'] ?></dd><dd>Riawayat Perjalanan : <?php echo $row['riwayat_perjalanan'] ?></dd><dd>Status : <?php echo $row['jenis'] ?></dd></dl>");
                  suspects.addLayer(suspect<?php echo $row['id']?>);
              <?php
                  }
              }
              ?>
              penderitas.addTo(map);
              suspects.addTo(map);

              var kabupaten = L.geoJson.ajax('geojson/indonesia_kab.geojson').addTo(map);

              var overlayMaps = {"Kabupaten": kabupaten, "Penderita": penderitas, "Suspect": suspects };
              
              L.control.layers(baseMaps, overlayMaps).addTo(map);
            </script>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Lokasi Persebaran Covid 19</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort">KTP</th>
                    <th scope="col" class="sort">Nama</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col" class="sort">Kabupaten</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <!-- ambil semua data dari database -->
                  <?php

                  $mysqli = connectdb("localhost", "root", "","bg_uas");
                  if($mysqli->connect_errno){
                    printf("Connect failed: %s\n", $mysqli->connect_error);
                    exit();
                  }

                  $sql = "SELECT ktp, nama, alamat, nama_kab, nama_prop, jenis FROM penderita INNER JOIN master_kabupaten on master_kabupaten_id = master_kabupaten.id";
                  $result = $mysqli->query($sql);
                  while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['ktp']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['nama_prop']."</td>";
                    echo "<td>".$row['nama_kab']."</td>";
                    echo "<td>".$row['alamat']."</td>";
                    echo "<td>".$row['jenis']."</td>";
                    echo "<td><form method='POST' action='updatependerita.php'><input type='hidden' value='".$row['ktp']."' name='ktp'><input type='submit' value='edit' name='submit' class='btn btn-warning btn-sm'></form>";
                    echo "<form method='POST' action='hapuspenderita.php'><input type='hidden' value='".$row['ktp']."' name='ktp'><input type='submit' value='delete' name='hapus' class='btn btn-danger btn-sm'></form></td>";
                    echo "</tr>";
                  }
                  
                  ?>
                </tbody>
              </table>
            </div>
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
