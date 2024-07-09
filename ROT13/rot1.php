<?php
require 'ROT13.php';
$rot = new ROT13();
if(!empty($_POST['convert'])){
    $convert = htmlentities($_POST['convert']);
    $word = $rot->encrypt($convert);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKRIPSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="rot13.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <header>
        <div class="container">
            <a href="../homepage.php"><img src="../CSS/logo.png" alt=""></a>
        </div>
        <hr color="#00b3b9" class="hr1">
    </header>
    <div class="deskripsi">
        <div class="container">
            <div class="conten-top">
                <h1><b>ROT13</b></h1>
            <hr color="#badaf1">
                <p>ROT13 (dari Bahasa Inggris rotate by 13, putar dengan 13 langkah), adalah algoritme enkripsi 
                    sederhana yang menggunakan sandi abjad-tunggal dengan pergeseran k=13 
                    (huruf A diganti dengan N, huruf B diganti dengan O, dan seterusnya). 
                    Enkripsi ini merupakan penggunaan dari sandi Caesar dengan geseran 13. 
                    ROT13 biasanya digunakan di forum internet, agar spoiler, jawaban teka-teki, kata-kata kotor, dan 
                    semacamnya tidak terbaca dengan sekilas. Hal ini mirip dengan mencetak jawaban TTS 
                    secara terbalik di surat kabar atau majalah.</p>
            </div>
        </div>
    </div>
    <div class="conten">
        <div class="container">
            <div class="contens">
                <h2>ROT13</h2>
                <hr color="#badaf1">
                <form action="" method="post" class="uw-container uw-margin-top">
                    <label>Plainteks</label>
                    <input id="convert" class="form-control text-monospace" type="text" name="convert">
                    <button type="submit" class="uw-btn uw-blue uw-margin-top">Enkripsi</button>
                </form>
                <div class="uw-container uw-row uw-margin-left">
                    <p>Hasil enkripsi : </p>
                    <h3><?php if(!empty($word)){
                            echo $word;
                        }
                        ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>

  <footer>
    <div class="container">
        <a href="#"><img src="../CSS/logo1.png"></a>
        <p>“You affect the world by what you browse.” — Tim Berners-Lee</p>
    </div>
  </footer>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>
</body>
</html>