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
          case '1':  
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
          
          // $createimage = imagecreatefrompng($image);
          // $output = "sertifikat.png";

          // $white = imagecolorallocate($createimage, 205, 245, 255);
          // $black = imagecolorallocate($createimage, 0, 0, 0);
          
          // $rotation = 0;
          // $origin_x = 200;
          // $origin_y=260;
          // $origin1_x = 120;
          // $origin1_y=90;
          
          if($nama_len<=7){
            $font_size = 40;
            $top = "40%";
            $left = "14.5%";
          }
          elseif($nama_len<=12){
            $font_size = 40;
            $top = "40%";
            $left = "11.3%";
          }
          elseif($nama_len<=15){
            $font_size = 40;
            $top = "40%";
            $left = "9.4%";
          }
          elseif($nama_len<=20){
            $font_size = 40;
            $top = "40%";
            $left = "6.5%";
          }
          elseif($nama_len<=22){
            $font_size = 40;
            $top = "40%";
            $left = "5.5%";
          }
          elseif($nama_len<=33){
            $font_size = 40;
            $top = "40%";
            $left = "7.5%";
          }
          else {
            $font_size =40;
            $left = "30%";
          }

          // $certificate_text = $name;
          
          // //untuk font
          // $drFont = dirname(__FILE__)."/prodsans.ttf";

          // //Munculin nama
          // $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);

          //Munculin tahun
        //   $text2 = imagettftext($createimage, $font_size_tahun, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $tahun);

          // imagepng($createimage,$output,3);

          $imgSize=  getimagesize($image);
          $imgWidth = $imgSize[0];
          $imgHeight = $imgSize[1];
          ?>
          <div id="wrapper">
          <div id='ct' class='row h-auto'><div class='col-12'><img id="images" class="img-fluid" src="<?php echo $image; ?>"><p id='txt'></p></div></div>
          </div>
          
          <script type="text/javascript">
            $(document).ready(function() {
              var imgW = <?= $imgWidth;?>;
              var imgH = <?= $imgHeight;?>;
              var div = document.createElement('div');
              div.id = 'content';
              // div.classList.add('container');
              div.style.width=imgW;
              div.style.height=imgH;
              div.style.position="relative";
              document.getElementById('wrapper').appendChild(div);
              var ct = document.getElementById('ct');
              var imgContainer = document.getElementById('images');
              div.appendChild(ct);
              let font = document.getElementById('txt');
              font.classList.add('text-center','text-justify');
              font.style.top = "<?= $top; ?>";
              font.style.left = "<?= $left; ?>";
              font.style.position= "absolute";
              font.style.fontSize = <?= $font_size;?>;
              font.innerHTML="<?= $name;?>";
              console.log(<?= $nama_len;?>);
              
            });
            
          </script>
          <!--Tombol Download-->
          <a href="<?php echo $document; ?>" class="btn btn-success">Unduh Sertifikat</a>
<?php
    }