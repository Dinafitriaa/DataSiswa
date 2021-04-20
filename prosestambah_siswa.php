<?php

include 'koneksi.php';

	
  $nama      = $_POST['nama'];
  $jeniskelamin  = $_POST['jeniskelamin'];
  $jurusan   = $_POST['jurusan'];
  $foto    = $_FILES['foto']['name'];

if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); 
  $x = explode('.', $foto); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_foto_baru = $angka_acak.'-'.$foto; 
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'foto/'.$nama_foto_baru); 
                  $query = "INSERT INTO datasiswa(nama, jeniskelamin , jurusan,  foto) VALUES ('$nama', '$jeniskelamin', '$jurusan', '$nama_foto_baru')";
                  $result = mysqli_query($koneksi, $query);
              
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             
                echo "<script>alert('Ekstensi foto yang boleh hanya jpg atau png.');window.location='tambah_siswa.php';</script>";
            }
} else {
   $query = "INSERT INTO datasiswa(nama,jeniskelamin, jurusan,  foto) VALUES ('$nama', '$jeniskelamin', '$jurusan', '$nama_foto_baru')";
                  $result = mysqli_query($koneksi, $query);
                 
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}

 
