<?php
  session_start();

  if (!isset($_SESSION['email'])) {
    header("Location: index.php");
  }

  if(isset($_POST['edit'])){

    $ktp = $_POST['ktp'];
    $lokasi = $_POST['lokasikarantina'];
    $keluhan = "";
    $riwayat = "";
    if (isset($_POST['keluhan'])) {
      $keluhan = $_POST['keluhan'];
    }
    if (isset($_POST['riwayat'])) {
      $riwayat = $_POST['riwayat'];
    }
    $jenis = $_POST['jenis2'];
    
    include('koneksi.php');
    $mysqli = connectdb("localhost", "root", "","bg_uas");
    if($mysqli->connect_errno){
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $sql = "UPDATE penderita SET lokasi_karantina='".$lokasi."', keluhan_sakit='".$keluhan."', riwayat_perjalanan='".$riwayat."', jenis='".$jenis."' WHERE ktp='".$ktp."' ";
    $result = $mysqli->query($sql);
    if($result === TRUE){
        header('Location: admin.php');
    }
    else{
        header("Location: admin.php");
    }
  }
?>