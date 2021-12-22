<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
@font-face {
  font-family: prodsans;
  src: url(./prodsans.ttf);
}
p {
    font-family: prodsans;
}
</style>
<?php
    if (isset($_POST['cetak'])) {
      switch($_POST['member']){
          case '1':  //Sertif silver
            $image = "silver.png";
            break;
        
          case '2':
            $image = "gold.png";
            break;

          case '3':
            $image = "platinum.png";
            break;
        
        default:
        echo "Masukkan Pilihan";
      }

      $name = strtoupper($_POST['nama']);
          $nama_len = strlen($_POST['nama']);
          $tahun = $_POST['tahun'];
          if ($tahun) {
              $font_size_tahun=10;
          }
          
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

          $certificate_text = $name;
          
          //untuk font
          $drFont = dirname(__FILE__)."/prodsans.ttf";

          //Munculin nama
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);

          //Munculin tahun
        //   $text2 = imagettftext($createimage, $font_size_tahun, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $tahun);

          imagepng($createimage,$output,3);

          $imgSize=  getimagesize($output);
          $imgWidth = $imgSize[0];
          $imgHeight = $imgSize[1];
          ?>
          <div id="wrapper"></div>
          <!-- <img src="<?php //echo $output; ?>"> -->
          <script type="text/javascript">
            $(document).ready(function() {
              var imgW = <?= $imgWidth;?>;
              var imgH = <?= $imgHeight;?>;
              var div = document.createElement('div');
              div.id = 'content';
              div.style.width=imgW;
              div.style.height=imgH;
              document.getElementById('wrapper').appendChild(div);
              $(div).wrapAll("<div class='row d-flex justify-content-center'><div class='col-12'><p id='text'></p></div></div>");
            });
          </script>
<?php
    }