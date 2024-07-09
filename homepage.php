<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKRIPSI</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <header>
      <div class="container">
        <a href="homepage.php"><img src="CSS/logo.png" alt=""></a>
      </div>
      <hr class="hr1" color="#00b3b9">
    </header>
    <div class="conten">
      <div class="container">
          <div class="contens">
            <div class="header-conten">
              <h2>AKRIPSI</h2>
            </div>
              <hr color="#badaf1" class="hr2">
            <div class="isi">
              <?= "<p>Akripsi (Aplikasi enkripsi dan dekripsi) merupakan aplikasi yang dapat mengenkripsi dan 
              mendekripsi pesan dengan beberapa metode yang tersedia. Enkripsi merupakan proses menyamarkan pesan asli (Plainteks)
              menjadi pesan acak (Cipherteks), sedangkan Dekripsi merupakan proses mengubah pesan acak (Cipherteks) 
              menjadi pesan asli (Plainteks) </p>";?>
            </div>
          </div>
          <div class="contens">
            <h1>Silahkan Pilih Metode Kriptografi!</h1>
            <div class="dropdown" data-bs-theme="dark">
              <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilihan Metode
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonDark">
                <li><a class="dropdown-item" href="caesar/caesar.php">Caesar Cipher</a></li>
                <li><a class="dropdown-item" href="alfabet/sub.php">Substitution Cipher</a></li>
                <li><a class="dropdown-item" href="vigenere/index.php">Vigenere Cipher</a></li>
                <li><a class="dropdown-item" href="ROT13/rot1.php">ROT13</a></li>
              </ul>
            </div>
          </div>
        </div>   
    </div>
    <footer>
      <div class="container">
        <a href="#"><img src="CSS/logo1.png"></a>
        <p>“You affect the world by what you browse.” — Tim Berners-Lee</p>
      </div>
  </footer>
</body>
</html>