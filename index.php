<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Cetak Sertifikat</title>
  </head>
  <body>
  <center>
      <!-- Bagian Head -->
      <form method="POST" action="output.php">
      <br><br><br>
      <h3 style="color:blue;">Cetak Sertifikat TDI</h3>
      <br>
      <img src="tdi.png" style="width:240px;height: 80px;">
      
      <br><br><br><br>
      <form method="post" action="">
      <h4><b> Isi Data berikut </b></h4>

    <!-- Bagian Nama Perusahaan -->
    <label for="nama">Nama Perusahaan : </label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Perusahaan..">
      </div>
      <br>
      
<!-- Bagian Jenis Member -->
<form>
    <div class="col-sm-7">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis Member :</label>
      <select name="member" class="form-control">
        <option value="">Pilih Jenis Member..</option>
        <option value="1">Silver</option>
        <option value="2">Gold</option>
        <option value="3">Platinum</option>
      </select>
    </div>
    <br>
        <div class="form-group">
    <label for="tahun">Tahun Bergabung :</label>
      <div class="col-sm-7">
        <input type="text" name="tahun" class="form-control" id="organization" placeholder="Masukkan Tahun Bergabung..">
      </div>
        <br>
      <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
    </form>
    <!-- Bagian Proses -->