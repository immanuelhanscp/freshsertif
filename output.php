<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- plugins -->
<script src="html2canvas.js"></script>
<script src="js/all.min.js"></script>
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

  $fontfam = "prodsans";
  $bg1 = "-webkit-repeating-linear-gradient(to top left, #081B3E 0%, #015C86 25%, #081B3E 50%, #015C86 75%, #081B3E 100%)";
  $bg2 = "repeating-linear-gradient(to top left, #081B3E 0%, #015C86 25%, #081B3E 50%, #015C86 75%, #081B3E 100%)";
  $bg3 = "-webkit-background-clip: text";
  $bg4 = "-webkit-text-fill-color: transparent";

  $name = strtoupper($_POST['nama']);
  $nama_len = strlen($_POST['nama']);
  $tahun = $_POST['tahun'];
  if ($tahun) {
    $font_size_tahun = 36;
    $bot = "24%";
    $right = "41%";
  }
  if ($nama_len <= 8) {
    $font_size = 120;
    $top = "40%";
    $left = "36%";
  } elseif ($nama_len <= 12) {
    $font_size = 120;
    $top = "40%";
    $left = "28%";
  } elseif ($nama_len <= 15) {
    $font_size = 120;
    $top = "40%";
    $left = "22%";
  } elseif ($nama_len <= 18) {
    $font_size = 120;
    $top = "40%";
    $left = "17%";
  } elseif ($nama_len <= 20) {
    $font_size = 120;
    $top = "40%";
    $left = "14%";
  } elseif ($nama_len <= 22) {
    $font_size = 120;
    $top = "40%";
    $left = "11%";
  } elseif ($nama_len <= 25) {
    $font_size = 100;
    $top = "41%";
    $left = "9.5%";
  } elseif ($nama_len <= 28) {
    $font_size = 95;
    $top = "41.5%";
    $left = "9%";
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
      <div class='col-12'>
        <img id="images" class="img-fluid" src="<?php echo $image; ?>">
        <p id='txt'></p>
        <p id='txt1'></p>
      </div>
    </div>
  </div>
  <div class="row justify-content-center d-flex">
    <button class="btn btn-success mx-4" id="btnshow">Show &emsp;<i class="fas fa-eye"></i></button>
    <a type="button" class="text-white btn btn-success mx-2" id="btndwl">Download &emsp; <i class="fas fa-download"></i></a type="button">
    <a type="button" class="text-white btn btn-success mx-2" id="pdfdwl">PDF &emsp; <i class="fas fa-download"></i></a type="button">
  </div>


  <!--Download Button-->
  <script type="text/javascript">
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
    $('#wrapper').hide();
    //nama
    var font = document.getElementById('txt');
    font.classList.add('text-center', 'text-justify');
    font.style.top = "<?= $top; ?>";
    font.style.left = "<?= $left; ?>";
    font.style.position = "absolute";
    font.style.fontFamily = "<?= $fontfam ?>";

    font.style.fontSize = "<?= $font_size; ?>";
    font.innerHTML = "<?= $name; ?>";
    //tahun
    let font1 = document.getElementById('txt1');
    font1.classList.add('text-right');
    font1.style.bottom = "<?= $bot; ?>";
    font1.style.right = "<?= $right; ?>";
    font1.style.position = "absolute";
    font1.style.fontSize = <?= $font_size_tahun; ?>;
    font1.innerHTML = "<?= $tahun; ?>";
    var cvs;
    $(document).ready(function() {
      $('#btnshow').on('click', function(e) {
        e.preventDefault;
        var wrap = $('#wrapper');
        $('#wrapper').show();
        var x = $("#txt").offset().left;
        var y = $("#txt").offset().top;
        var x1 = $("#txt").offset().left;
        var y1 = $("#txt").offset().top;
  
        console.log('x: ' + x + 'y: ' + y);
        html2canvas(wrap, {
          onrendered: function(canvas) {
            console.log(canvas);
            var ctx = canvas.getContext('2d');
            let grad = ctx.createLinearGradient(0, 0, canvas.width, 0);
            grad.addColorStop("0", "#081B3E");
            grad.addColorStop("0.25", "#015C86");
            grad.addColorStop("0.5", "#081B3E");
            grad.addColorStop("0.75", "#015C86");
            grad.addColorStop("1", "#081B3E");
            ctx.fillStyle = grad;
            ctx.fillText(font.innerHTML, x, y);
            cvs = canvas;
          }
        });
      })
      //png
      $('#btndwl').on('click', function(df) {
        df.preventDefault;
        var imgdata = cvs.toDataURL("image/png");
        let newData = imgdata.replace(/^data:image\/png/, "data:application/octet-stream");
        $('#btndwl').attr("download", "sertifikat.png").attr("href", newData);
      });

     //convert to pdf
     



    });
  </script>
<?php
}
