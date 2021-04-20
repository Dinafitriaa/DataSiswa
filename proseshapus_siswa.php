<?php
include ('koneksi.php');
$nis = $_GET["nis"];

    $query = "DELETE FROM datasiswa WHERE nis='$nis' ";
    $hasil_query = mysqli_query($koneksi, $query);

   
    if(!$hasil_query) {
      die ("Query Error : ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
    }