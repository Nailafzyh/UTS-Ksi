<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlpaMirror</title>
<!--sambung ke css-->
<link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="container">
        <h1>ALPHAMIRROR</h1>
        <form method="POST">
            <label>Masukkan Text</label>
            <input type="text" name="text" required>

            <div class="button-group">
                <button type="submit" name="enkripsi">Enkripsi</button>
                <button type="submit" name="deskripsi">Deskripsi</button>
            </div>
</form>

<?php

// substitusinya
$awal = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$jadi = "QWERTYUIOPASDFGHJKLZXCVBNM";

//====proses enkripsi====
if (isset($_POST['enkripsi'])){
    $text = strtoupper($_POST['text']);

    //proses reverse
    $reverse = strrev($text);
    $hasil = "";

    //proses sub
    for ($n = 0; $n<strlen($reverse); $n++){
        $ketik = $reverse[$n];
        $posisi = strpos($awal, $ketik);
        if ($posisi !== false){
            $hasil .= $jadi[$posisi];
        } else {
            $hasil.= $ketik;
        }
    }

    echo "
    <div class='hasil'>
           <h3>HASIL ENKRIPSI</h3>
           <p><b>Teks Asli :</b> $text</p>
           <p><b>Hasil Mirror :</b> $reverse</p>
           <p><b>Hasil Enkripsi :</b> $hasil</p>
        </div>
        ";
}

//====proses deskipsi===
if (isset($_POST['deskripsi'])){
    $text = strtoupper($_POST['text']);
    $hasil = "";

    //membalikkan sub
    for ($n = 0; $n<strlen($text); $n++){
        $ketik = $text[$n];
        $posisi = strpos($jadi, $ketik);
        if ($posisi !== false){
            $hasil .= $awal[$posisi];
        } else {
            $hasil.= $ketik;
        }
    }

    //mengembalikan reverse 
    $deskripsi = strrev($hasil);

     echo "
    <div class='hasil'>
           <h3>HASIL DESKRIPSI</h3>
           <p><b>Teks Enkripsi:</b> $text</p>
           <p><b>Balik Ke Substitusi :</b> $hasil</p>
           <p><b>Teks Asli :</b> $deskripsi</p>
        </div>
        ";
}
?>
  </div>
</body>
</html>