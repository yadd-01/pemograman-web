<?php
$bilangan1 = $_GET['bil1'];
$bilangan2 = $_GET['bil2'];
$jumlah = $bilangan1 + $bilangan2;
?>
<html>
<head>
    <title>Contoh Request GET</title>
</head>
<body>
    <h1>Input dua bilangan</h1>
    <?php
    echo "<p>Anda telah memasukkan bilangan pertama = ".$bilangan1. "</p>";
    echo "<p>Anda telah memasukkan bilangan kedua = ".$bilangan2. "</p>";
    echo "<p>Hasil penjumlahannya adalah ".$jumlah. "</p>";
    ?>
</body>
</html>
