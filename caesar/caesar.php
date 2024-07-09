<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKRIPSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="caesar.css">
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
                <h1><b>Ceaesar</b> Cipher</h1>
            <hr color="#badaf1">
                <p>Caesar Cipher merupakan salah satu teknik kriptografi klasik ,dengan 
                    algoritma cipher substitusi menggunakan konsep pergeseran huruf alphabet. Caesar cipher digunakan untuk 
                    menyamarkan pesan asli menjadi pesan acak (enkripsi) atau 
                    pun sebaliknya mengubah pesan acak menjadi pesan asli (dekripsi). Apabila pesan di enkripsi menggunakan caesar cipher,
                    maka pesan tersebut harus di dekripsi dengan metode caesar cipher agar mendapatkan pesan aslinya.</p>
                <p>Contoh dari caesar cipher, Misalnya teks asli (Plainteks) adalah ibu diberikan kuncinya (key) 1, maka 
                    semua alphabet bergeser satu dan kata kata ibu menjadi (cipherteks) jcv </p>
            </div>
        </div>
    </div>
    <div class="conten">
        <div class="container">
            <?php
            
            if(isset($_POST['submit1'])){
                    function Cipher($ch, $key)
                    {
                        if (!ctype_alpha($ch))
                                return $ch;

                        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                        return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
                    }

                    function Encipher($input, $key)
                    {
                        $output = "";

                        $inputArr = str_split($input);
                        foreach ($inputArr as $ch)
                                $output .= Cipher($ch, $key);

                        return $output;
                    }

                    function Decipher($input, $key)
                    {
                            return Encipher($input, 26 - $key);
                    }
                    
                    
                }else if(isset($_POST['submit2'])){
                    function Cipher($ch, $key)
                    {
                        if (!ctype_alpha($ch))
                                return $ch;

                        $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                        return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
                    }

                    function Encipher($input, $key)
                    {
                        $output = "";

                        $inputArr = str_split($input);
                        foreach ($inputArr as $ch)
                                $output .= Cipher($ch, $key);

                        return $output;
                    }

                    function Decipher($input, $key)
                    {
                            return Encipher($input, 26 - $key);
                    }
                }
            ?>
            <div class="contens">
                    <h2>Plainteks</h2>
                    <hr color="#badaf1">
                    <form name="enkripsi" method="post">
                            <textarea name="plain" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" 
                                oninput="setCustomValidity('')" type="text" class="form-control" rows="2" placeholder="Isikan teks disini"></textarea>            
            </div>
            <div class="contens">
                <h2>Key(Tidak boleh negatif)</h2>
                <hr color="#badaf1">
                <form name="enkripsi" method="post">
                    <input title="Pilih Key." required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" 
                        oninput="setCustomValidity('')" type="number" class="form-control" name="metode" placeholder="Masukan Key">
                <table>
                    <tr>
                        <td><input type="submit" name="submit1" value="Enkrip" style="width: 100%"></td>
                        <td><input type="submit" name="submit2" value="Dekrip" style="width: 100%"></td>
                    </tr>
                </table>
                    
            </div>
            <div class="contens">
                    <h2>Hasil</h2>
                    <hr color="#badaf1">
                        <label>Hasil Enkripsi</label>
                            <table class="table table-bordered">
                                <tr style="background-color:antiquewhite">
                                    <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo Encipher($_POST['plain'], $_POST['metode']);} 
                                    if (isset($_POST['submit2'])){ echo Decipher($_POST['plain'], $_POST['metode']);}?></b></td>
                                </tr>
                            </table>
                        <label>Teks Asli</label>
                            <table class="table table-bordered">
                                <tr style="background-color:antiquewhite">
                                    <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo Decipher(Encipher($_POST['plain'], $_POST['metode']),$_POST['metode']);} 
                                    if (isset($_POST['submit2'])){ echo Encipher(Decipher($_POST['plain'], $_POST['metode']),$_POST['metode']);}?></b></td>
                                </tr>
                            </table>
                        <label>Key</label>
                            <table class="table table-bordered">
                                <tr style="background-color:antiquewhite">
                                    <td style="text-align:center"><b><?php if (isset($_POST['submit1'])){ echo $_POST['metode'];} 
                                    if (isset($_POST['submit2'])){ echo $_POST['metode'];}?></b></td>
                                </tr>
                            </table>
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