<?php
  session_start();

  if (!isset($_SESSION['email'])) {
    header("Location: index.php");
  }

  if(isset($_POST['hapus'])){
    $ktp = $_POST['ktp'];

    include('koneksi.php');
    
    $mysqli = connectdb("localhost", "root", "","bg_uas");
    if($mysqli->connect_errno){
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }

    $sql = "DELETE FROM penderita WHERE ktp = '".$ktp."'";
    $result = $mysqli->query($sql);
    if($result === TRUE){
        header("Location: admin.php");
    }
    else{
        header("Location: admin.php");
    }
  }
?>