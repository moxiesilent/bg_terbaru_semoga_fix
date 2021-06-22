<?php
  session_start();

  if (!isset($_SESSION['email'])) {
    header("Location: index.php");
  }

  if(isset($_POST['submit'])){
    $ktp = $_POST['ktp'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $lokasi = $_POST['lokasikarantina'];
    $keluhan = "";
    $riwayat = "";
    if (isset($_POST['keluhan'])) {
      $keluhan = $_POST['keluhan'];
    }
    if (isset($_POST['riwayat'])) {
      $riwayat = $_POST['riwayat'];
    }
    $jenis = $_POST['jenis'];
    $kab = $_POST['kabupaten'];
    $x = $_POST['x'];
    $y = $_POST['y'];

    include('koneksi.php');
    
    $mysqli = connectdb("localhost", "root", "","bg_uas");
    if($mysqli->connect_errno){
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }
    $sql1 = "SELECT * FROM master_kabupaten where nama_kab='".$kab."'";
    $res = $mysqli->query($sql1);
    if ($row = $res->fetch_assoc()) {
      $idkab = $row['id'];
    }

    $sql = "INSERT INTO penderita (nama, ktp, alamat, lokasi_karantina, keluhan_sakit, riwayat_perjalanan, jenis, master_kabupaten_id, x, y) values  ('".$nama."','".$ktp."','".$alamat."','".$lokasi."','".$keluhan."','".$riwayat."','".$jenis."',".$idkab.",".$x.",".$y.")";
    $result = $mysqli->query($sql);
    if($result === TRUE){
        header("Location: admin.php");
    }
    else{
        header("Location: admin.php");
    }
  }
?>