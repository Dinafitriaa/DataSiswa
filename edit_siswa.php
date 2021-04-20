<?php include('koneksi.php');

   if (isset($_GET['nis'])) {
    $nis= $_GET['nis'];

    
    $query = "SELECT * FROM datasiswa WHERE nis ='$nis'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error :".mysqli_errno($koneksi).
         "-".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if(!count($data)){
      echo "<script>alert('Data tidak ditemukan pada tabel.');window.location='index.php';</script>";
    }

  }else{
    echo "<script>alert('Masukkan nis yang ingin di edit');window.location='index.php';</script>";
  }
  
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Siswa</title>
  <style type="text/css">

    *{
      font-family: "Trebuchet MS";

    }
    h1{
      text-transform: uppercase;
      color: #464775;
    }
    .base{
      width: 400px;
      padding: 20px;
      margin-left:auto;
      margin-right: auto; 
      background-color: #ededed;
    }
    label{
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input{
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background-color: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #464775;
    }
    button {
      border:1px solid #ddeeee;
      background-color: #464775;
      color: #fff;
      padding: 10px;
      font-size: 12px
      border: 0;
      margin-top: 20px;
      border-radius: 10px;

    }
    body{
      background-color: #F5F5F5;
      color: #464775;
      font-size: 15px;
      text-decoration:none; 
    }
  </style>
</head>
<body>
  <center>
    <h1>Edit Siswa <?php echo $data['nama'];?></h1>
  </center>
  <form method="POST" action="prosesedit_siswa.php" enctype="multipart/form-data">
  <section class="base">
    <div>
      <label>Nama</label>
      <input type="text" name="nama" autofocus="" required="" value=" <?php echo $data['nama'];?>" />
       <input type="hidden" name="nis"value=" <?php echo $data['nis'];?>" />
    </div>
    <div>
      <label>Jenis Kelamin</label>
      <input type="text" name="jeniskelamin" required="" value=" <?php echo $data['jeniskelamin'];?>"/>
    </div>
    <div>
      <label>Jurusan</label>
      <input type="text" name="jurusan" required="" value=" <?php echo $data['jurusan'];?>" />
    </div>
    <div>
      <label>Foto</label>
       <img src="foto/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
      <input type="file" name="foto" />
       <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar</i>
    </div>
    <div>
      <button type="submit">Simpan Data</button>
    </div>
  </section>
</form>
</body>
</html>