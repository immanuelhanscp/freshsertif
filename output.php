<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style>
  @font-face {
    font-family: prodsans;
    src: url(./prodsans.ttf);
  }

  p {
    font-family: prodsans;
    background: #081B3E;
    background: -webkit-repeating-linear-gradient(to top left, #081B3E 0%, #015C86 25%, #081B3E 50%, #015C86 75%, #081B3E 100%);
    background: -moz-repeating-linear-gradient(to top left, #081B3E 0%, #015C86 25%, #081B3E 50%, #015C86 75%, #081B3E 100%);
    background: repeating-linear-gradient(to top left, #081B3E 0%, #015C86 25%, #081B3E 50%, #015C86 75%, #081B3E 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }
</style>
<?php
if (isset($_POST['cetak'])) {
  switch ($_POST['member']) {
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
  };

  $name = strtoupper($_POST['nama']);
  $nama_len = strlen($_POST['nama']);
  $tahun = $_POST['tahun'];
  if ($tahun) {
    $font_size_tahun = 50;
    $topthn ="35%";
    $leftthn="40%";
  }
  if ($nama_len <= 8) {
    $font_size = 120;
    $top = "37%";
    $left = "36%";
    
  } elseif ($nama_len <= 12) {
    $font_size = 120;
    $top = "37%";
    $left = "28%";
  } elseif ($nama_len <= 15) {
    $font_size = 120;
    $top = "37%";
    $left = "22%";
  } elseif ($nama_len <= 18) {
    $font_size = 120;
    $top = "37%";
    $left = "20%";
    
  }elseif ($nama_len <= 20) {
    $font_size = 120;
    $top = "37%";
    $left = "14%";
  } elseif ($nama_len <= 22) {
    $font_size = 120;
    $top = "37%";
    $left = "9%";
  } elseif ($nama_len <= 28) {
    $font_size = 95;
    $top = "39%";
    $left = "7%";
  } else {
    $font_size = 95;
    $top = "39%";
    $left = "1%";
  }

  $imgSize =  getimagesize($image);
  $imgWidth = $imgSize[0];
  $imgHeight = $imgSize[1];
?>
  <div id="wrapper">
    <div id='ct' class='row h-auto'>
      <div class='col-12'><img id="images" class="img-fluid" src="<?php echo $image; ?>">
        <p id='txt'></p>
        <p id='txt1'></p>
      </div>
    </div>
  </div>
  <!--Tombol Download-->
  <center>
    <a href="<?php echo $document; ?>" class="btn btn-success">Unduh Sertifikat</a>
  </center>

  <script type="text/javascript">
    $(document).ready(function() {
      var imgW = <?= $imgWidth; ?>;
      var imgH = <?= $imgHeight; ?>;
      var div = document.createElement('div');
      div.id = 'content';
      div.style.width = imgW;
      div.style.height = imgH;
      div.style.position = "relative";
      document.getElementById('wrapper').appendChild(div);
      var ct = document.getElementById('ct');
      var imgContainer = document.getElementById('images');
      div.appendChild(ct);
      //nama
      let font = document.getElementById('txt');
      font.classList.add('text-center', 'text-justify');
      font.style.top = "<?= $top; ?>";
      font.style.left = "<?= $left; ?>";
      font.style.position = "absolute";
      font.style.fontSize = <?= $font_size; ?>;
      font.innerHTML = "<?= $name; ?>";
      //tahun
      let font1 = document.getElementById('txt1');
      font1.classList.add('text-right');
      font1.style.topthn = "<?= $top; ?>";
      font1.style.leftthn = "<?= $left; ?>";
      //font1.style.position = "absolute";
      font1.style.fontSize = <?= $font_size_tahun; ?>;
      font1.innerHTML = "<?= $tahun; ?>";


      console.log(<?= $nama_len; ?>);
    });
  </script>
<?php
}
