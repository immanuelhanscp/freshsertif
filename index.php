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
      <form method="POST" action="">
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
        <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Perusahaan..">
      </div>
      <br>
      
<!-- Bagian Jenis Member -->
<form>
    <div class="col-sm-7">
      <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis Member :</label>
      <select name="member">
        <option selected>Pilih Jenis Member..</option>
        <option value="1">Silver</option>
        <option value="2">Gold</option>
        <option value="3">Platinum</option>
      </select>
    </div>
    <br>
</form>

      <!-- Bagian Tahun -->
    <form class="form-horizontal">
        <div class="form-group">
    <label for="tahun">Tahun Bergabung :</label>
      <div class="col-sm-7">
        <input type="text" name="tahun" class="form-control" id="organization" placeholder="Masukkan Tahun Bergabung..">
      </div>
        <br>
      <button type="submit" name="cetak" class="btn btn-primary">Cetak</button>
    </form>
    <!-- Bagian Proses -->
    <?php 
      switch($_POST['member']){
          case '1':  //Sertif silver
           
          $name = strtoupper($_POST['nama']);
          $nama_len = strlen($_POST['nama']);

          $image = "silver.png";
          $createimage = imagecreatefrompng($image);
          $output = "sertifikat.png";

          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);
          
          $rotation = 0;
          $origin_x = 200;
          $origin_y=260;
          $origin1_x = 120;
          $origin1_y=90;
          
          if($nama_len<=7){
            $font_size = 25;
            $origin_x = 190;
          }
          elseif($nama_len<=12){
            $font_size = 30;
          }
          elseif($nama_len<=15){
            $font_size = 26;
          }
          elseif($nama_len<=20){
             $font_size = 18;
          }
          elseif($nama_len<=22){
            $font_size = 15;
          }
          elseif($nama_len<=33){
            $font_size=11;
          }
          else {
            $font_size =10;
          }

          $certificate_text = $nama;
          
          //untuk font
          $drFont = dirname(__FILE__)."/prodsans.ttf";
          $drFont1 = dirname(__FILE__)."/prodsans.ttf";

          //Munculin nama
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);

          //Munculin tahun
          $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $tahun);

          imagepng($createimage,$output,3);


            break;
        
          case '2':
            break;

          case '3':
            break;
        
        default:
        echo "Masukkan Pilihan";
      }