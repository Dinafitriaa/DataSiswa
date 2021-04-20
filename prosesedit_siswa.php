<?php

include 'koneksi.php';

	$nis      = $_POST['nis'];
  $nama      = $_POST['nama'];
  $jeniskelamin  = $_POST['jeniskelamin'];
  $jurusan   = $_POST['jurusan'];
  $foto     = $_FILES['foto']['name'];

if($foto != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); 
  $x = explode('.', $foto); 
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_foto_baru = $angka_acak.'-'.$foto; 


        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'foto/'.$nama_foto_baru); 
                  $query = "UPDATE datasiswa SET nama = '$nama',jeniskelamin = '$jeniskelamin',jurusan = '$jurusan',foto= '$nama_foto_baru'";
                  $query .= "WHERE nis = '$nis'";

                  $result = mysqli_query($koneksi, $query);
              
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                  }

            } else {     
             
                echo "<script>alert('Ekstensi foto yang boleh hanya jpg atau png.');window.location='edit_siswa.php';</script>";
            }
} else {
     $query = "UPDATE datasiswa SET nama = '$nama',jeniskelamin = '$jeniskelamin',jurusan = '$jurusan'";
                  $query .= "WHERE nis = '$nis'";

                  $result = mysqli_query($koneksi, $query);
              
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    
                    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                  }
}

 
