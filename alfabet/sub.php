<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AKRIPSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="sub.css">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>.bookmark-small::before{margin-top:-50px;height:50px}.extra-top-margin{margin-top:1.2em}div.crypto-tool-letter{display:inline-block;margin:.1em;line-height:1.1em;text-align:center;cursor:pointer}
div.crypto-tool-letter.selected{background-color:#ff0}input.crypto-tool-letter-input{width:1.6em;text-align:center;padding-left:0;padding-right:0}</style>
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
                <h1><b>Substitusi</b> Cipher</h1>
            <hr color="#badaf1">
            <?="<p>Cipher Substitusi adalah cipher dengan cara mensubstitusi huruf dengan huruf yang lain sesuai dengan yang ditetapkan.</p><br><p> Cara mengenkripsi dan dekripsinya yaitu menentukan Key/Kuncinya sendiri,sehingga kunci pengirim dan penerimanya sama.</p>";?>
            </div>
        </div>
    </div>
    
        <div class="container">
            <div class="contens">
                <div class="jumbotron">
                    <h2 id="tool">Cipher Subtitusion</h2>
                    <hr color="#badaf1">
                    <div class="form-group">
                        <textarea class="form-control text-monospace" rows="4" id="srcText" spellcheck="false" placeholder="Masukan pesan disini"></textarea>
                    </div>
                </div>
                    <p>
                        <center><button class="btn btn-success mt-1" onclick="startSolving();">Start</button></center>
                    </p>
                    <hr color="#badaf1"/>
                    <div class="form-group">
                        <label for="language" class="language"><h5>Language</h5></label>
                        <select class="form-control" id="language" onchange="changeLanguage();" style="max-width: 15em;">
                            <option value="en" selected>English</option>
                            <option value="custom">Custom...</option>
                        </select>
                    </div>
        
                    <hr color="#badaf1"/>
                    <div><h5 id="manualsolve" class="plainteks">Plaintext</h5></div>
                    <!--<h5 id="manualsolve" class="bookmark-small">Plaintext</h5>-->
                    <div id="manualtext" class ="plainteks"onclick="deselectLetter();">
                    </div>
                    <hr color="#badaf1">
                    <br />
                    <div class="key"><h5>Key</h5></div>
                    <div id="manualkey" class="key">
                    </div>
                    <hr color="#badaf1">
            </div>        
        </div>
    <script>
        function startSolving() {
            initManualKey('');
            initManualText(document.getElementById('srcText').value, getAlphabet2());
            scrollTo('manualsolve');
        }
    
        function setKey(key) {
            initManualKey(key);
            initManualText(document.getElementById('srcText').value, key);
            scrollTo('language');
        }
    
        function getAlphabet1() {
            var language = document.getElementById("language").value;
            switch (language) {
                case 'en':
                    return 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                default:
                    var alphabet = document.getElementById("alphabet").value.toLowerCase();
                    if (alphabet.length === 0)
                        alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    return alphabet;
            }
        }
    
        function getAlphabet2() {
            var elements = document.getElementById('manualkey').getElementsByClassName('crypto-tool-letter-input');
            var alphabet = '';
            for (var i = 0; i < elements.length; i++) {
                var ch = elements[i].value;
                if (ch.length == 0)
                    alphabet += '-';
                else
                    alphabet += ch[0];
            }
            return alphabet.toLowerCase();
        }
    
        function initManualKey(alphabet2) {
            var alphabet1 = getAlphabet1();
            while (alphabet2.length < alphabet1.length)
                alphabet2 += '-';
            var str = '';
            for (var i = 0; i < alphabet1.length; i++) {
                var ch = alphabet2[i];
                if (ch === '-')
                    ch = '';
                str += '<div class="crypto-tool-letter crypto-key-' + alphabet1[i] + '" onclick="' + "selectLetter('" + alphabet1[i] + "')" + '"><input type="text" class="crypto-tool-letter-input" value="' + ch + '" oninput="' + "changeLetter('" + alphabet1[i] + "'" + ', this)"><br />' + alphabet1[i] + '</div>';
            }
    
            document.getElementById('manualkey').innerHTML = str;
        }
    
        function initManualText(text, alphabet2) {
            var alphabet1 = getAlphabet1();
            while (alphabet2.length < alphabet1.length)
                alphabet2 += '-';
            text = text.toUpperCase();
            var str = '';
            for (var i = 0; i < text.length; i++) {
                var p = alphabet1.indexOf(text[i]);
                if (p !== -1) {
                    let c = alphabet2[p];
                    str += '<div class="crypto-tool-letter crypto-text-' + text[i] + '" onclick="' + "selectLetter('" + text[i] + "');" + 'event.stopPropagation();">' + c + '<br />' + text[i] + '</div>';
                } else {
                    str += '<div class="crypto-tool-letter">&nbsp;<br />' + text[i] + '</div>';
                }
            }
    
            document.getElementById('manualtext').innerHTML = str;
        }
    
        function deselectLetter() {
            var oldSelected = document.getElementsByClassName('selected');
            while (oldSelected.length > 0) {
                oldSelected[0].classList.remove('selected');
            }
        }
    
        function selectLetter(letter) {
            deselectLetter();
    
            // Key
            var keyElement = document.getElementById('manualkey').getElementsByClassName('crypto-key-' + letter)[0];
            if (keyElement !== undefined) {
                keyElement.classList.add('selected');
                var inputElement = keyElement.getElementsByClassName('crypto-tool-letter-input')[0];
                inputElement.focus();
                inputElement.select();
            }
    
            // Text
            var textElements = document.getElementById('manualtext').getElementsByClassName('crypto-text-' + letter);
            if (textElements != undefined) {
                for (var i = 0; i < textElements.length; i++) {
                    textElements[i].classList.add('selected');
                }
            }
        }
    
        function changeLetter(letter, element) {
            // Only one character allowed
            var value = element.value.toLowerCase();
            if (value.length > 1) {
                value = value[value.length - 1];
            }
            element.value = value;
            element.select();
    
            // Text
            var textElements = document.getElementById('manualtext').getElementsByClassName('crypto-text-' + letter);
            for (var i = 0; i < textElements.length; i++) {
                textElements[i].innerHTML = value + '<br />' + letter;
            }
    
            updateLettersUsed();
        }
    </script>
 <!--<footer>
    <div class="container">
        <a href="#"><img src="../CSS/logo1.png"></a>
        <p>“You affect the world by what you browse.” — Tim Berners-Lee</p>
    </div>
  </footer>-->
</body>
</html>