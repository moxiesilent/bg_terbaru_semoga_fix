<?php
  session_start();

  if (!isset($_SESSION['email'])) {
    header("Location: index.php");
  }
?>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Ubah Data Penderita Covid 19</h3><br>
              <h4 class="text-right"><u>Mohon untuk tidak mengubah data KTP anda</u></h4>
            </div>
            <form action="prosesubah.php" method="POST" style="margin: 2%">
              <?php
              if(isset($_POST['submit'])){

                $ktp = $_POST['ktp'];
                include('koneksi.php');
                
                $mysqli = connectdb("localhost", "root", "","bg_uas");
                if($mysqli->connect_errno){
                  printf("Connect failed: %s\n", $mysqli->connect_error);
                  exit();
                }

                $sql = "SELECT * FROM penderita WHERE ktp='".$ktp."'";
                $result = $mysqli->query($sql);
                while($row = $result->fetch_assoc()){ ?>
                  <div class="form-group text-left">
                          <label for="ktp">KTP / NIK</label>
                          <input type="text" class="form-control" id="ktp" value='<?php echo $row['ktp']; ?>' name="ktp">
                        </div>
                        <div class="form-group text-left">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" value='<?php echo $row['nama']; ?>' name="nama" required disabled>
                        </div>
                        <div class="form-group text-left">
                          <label for="alamat">Alamat</label>
                          <input type="text" class="form-control" id="alamat" value='<?php echo $row['alamat']; ?>' name="alamat" required disabled>
                        </div>
                        <div class="form-group text-left">
                          <label for="lokasikarantina">Lokasi Karantina</label>
                          <input type="text" class="form-control" id="lokasikarantina" value='<?php echo $row['lokasi_karantina']; ?>' name="lokasikarantina" required>
                        </div>
                        <div class="form-group text-left">
                          <label for="keluhan">Keluhan Sakit</label>
                          <input type="text" class="form-control" id="keluhan" value='<?php echo $row['keluhan_sakit']; ?>' name="keluhan">
                        </div>
                        <div class="form-group text-left">
                          <label for="riwayat">Riwayat Perjalanan</label>
                          <input type="text" class="form-control" id="riwayat" value='<?php echo $row['riwayat_perjalanan']; ?>' name="riwayat">
                        </div>
                        <div class="form-group text-left">
                          <label>Jenis Pasien</label>
                             <div class="custom-control custom-radio mb-3">
                            <input type="radio" id="penderita" name="jenis2" class="custom-control-input" value="penderita">
                            <label class="custom-control-label" for="penderita">Penderita</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input type="radio" id="suspect" name="jenis2" class="custom-control-input" value="suspect">
                            <label class="custom-control-label" for="suspect">Suspect</label>
                          </div>
                          <br>
                          <div class="form-group text-left">
                          <label for="kabupaten">Example select</label>
                          <select class="form-control" id="kabupaten" name="kabupaten" disabled>

                            <?php

                            $mysqli = connectdb("localhost", "root", "","bg_uas");
                            if($mysqli->connect_errno){
                              printf("Connect failed: %s\n", $mysqli->connect_error);
                              exit();
                            }

                            $sql2 = "SELECT * FROM master_kabupaten";
                            $result2 = $mysqli->query($sql2);
                            while($row2 = $result2->fetch_assoc()){
                              if ($row['master_kabupaten_id'] == $row2['id']) {
                                echo "<option selected>";
                                echo $row2['nama_kab'];
                                echo "</option>";
                              } else{
                                echo "<option>";
                                echo $row2['nama_kab'];
                                echo "</option>";
                              }
                            }
                            
                            ?>
                          </select>
                        </div>
                        </div>
                        <div class="form-group text-left">
                          <label for="x">Lokasi koordinat X</label>
                          <input type="text" class="form-control" id="x" value='<?php echo $row['x']; ?>' name="x" disabled>
                        </div>
                        <div class="form-group text-left">
                          <label for="y">Lokasi koordinat Y</label>
                          <input type="text" class="form-control" id="y" value='<?php echo $row['y']; ?>' name="y" disabled>
                        </div>
              <?php
                }
              }
              ?>
                        <input class="btn btn-primary"type="submit" name="edit" value="Ubah Data">
                    </form>
          </div>
        </div>
      </div>
      <!-- Footer -->
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
