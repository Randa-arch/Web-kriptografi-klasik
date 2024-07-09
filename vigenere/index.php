<?php

// inisialisasi variabel
$key = "";
$code = "";
$error = "";
$valid = true;
$color = "#010101";

// if form was submit
if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	// declare encrypt and decrypt funtions
	require_once('vigenere.php');
	
	// set the variables
	$key = $_POST['key'];
	$code = $_POST['code'];
	
	// check if password is provided
	if (empty($_POST['key']))
	{
		$error = "Please enter a password!";
		$valid = false;
	}
	
	// check if text is provided
	else if (empty($_POST['code']))
	{
		$error = "Please enter some text or code to encrypt or decrypt!";
		$valid = false;
	}
	
	// check if password is alphanumeric
	else if (isset($_POST['key']))
	{
		if (!ctype_alpha($_POST['key']))
		{
			$error = "Password should contain only alphabetical characters!";
			$valid = false;
		}
	}
	
	// inputs valid
	if ($valid)
	{
		// jika menekan tombol enkripsi
        if (isset($_POST['encrypt']))
		{
			$code = encrypt($key, $code);
			$error = "Text encrypted successfully!";
			$color = "#010101";
		}
			
		// jika menekan tombol dekripsi
		if (isset($_POST['decrypt']))
		{
			$code = decrypt($key, $code);
			$error = "Code decrypted successfully!";
			$color = "#010101";
		}
	}
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
    <link rel="stylesheet" href="vigenere.css">
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
                <h1><b>Vigenere</b> Cipher</h1>
            <hr color="#badaf1">
                <p>Vigenere adalah metode menyandikan teks alfabet dengan menggunakan 
                    deretan sandi Caesar berdasarkan huruf-huruf pada kata kunci. 
                    Sandi Vigenère merupakan bentuk sederhana dari sandi substitusi polialfabetik. 
                    Kelebihan sandi ini dibanding sandi Caesar dan sandi monoalfabetik lainnya 
                    adalah sandi ini tidak begitu rentan terhadap metode pemecahan sandi yang 
                    disebut analisis frekuensi.</p>
            </div>
        </div>
    </div>
    <div class="conten">
        <div class="container">
            <div class="contens">
                <h2>Key</h2>
                <hr color="#badaf1">
                <form action="index.php" method="post">
                <input class="form-control text-monospace" type="text" name="key" id="pass" value="<?php echo htmlspecialchars($key); ?>" />
            </div>
            <div class="contens">
                <h2>Plainteks/Cipherteks</h2>
                <hr color="#badaf1">
                <form action="index.php" method="post">
                <textarea id="box" name="code" class="form-control text-monospace"><?php echo htmlspecialchars($code); ?></textarea>
                <input type="submit" name="encrypt" class="btn btn-success mt-1" value="Enkripsi" onclick="validate(1)" />
                <input type="submit" name="decrypt" class="btn btn-success mt-1" value="Deskripsi" onclick="validate(2)" />
            </div>
        </div>
</div>
  <footer>
    <div class="container">
        <a href="#"><img src="../CSS/logo1.png"></a>
        <p>“You affect the world by what you browse.” — Tim Berners-Lee</p>
    </div>
  </footer>
</body>
</html>