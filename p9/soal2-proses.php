<html>
<head>
    <title>Hasil Hitung Pecahan Uang</title>
</head>
<body>
    <h1>Hasil Perhitungan Pecahan Uang</h1>

    <?php
        // Mengambil data input dari form
        $jumlahUang = $_POST['jumlah_uang']; 
        
        // Menampilkan jumlah uang yang diinput
        echo "<p><b>Jumlah Uang : Rp. ".number_format($jumlahUang, 0, ',', '.').",-</b></p>";
        echo "<p>Akan dipecah menjadi:</p>";

        // Logika perhitungan dari kode Anda
        $a = floor($jumlahUang / 100000);
        $jumlahUang %= 100000;

        $b = floor($jumlahUang / 50000);
        $jumlahUang %= 50000;

        $c = floor($jumlahUang / 20000);
        $jumlahUang %= 20000;

        $d = floor($jumlahUang / 5000);
        $jumlahUang %= 5000;

        $e = floor($jumlahUang / 100);
        $jumlahUang %= 100;

        $f = floor($jumlahUang / 50);

        // Menampilkan hasil
        echo "Jumlah Rp. 100.000 : ".$a. " lembar<br />";
        echo "Jumlah Rp. 50.000 : ".$b. " lembar<br />";
        echo "Jumlah Rp. 20.000 : ".$c. " lembar<br />";
        echo "Jumlah Rp. 5.000 : ".$d. " lembar<br />";
        echo "Jumlah Rp. 100 : ".$e. " keping<br />";
        echo "Jumlah Rp. 50 : ".$f. " keping<br />";
    ?>

</body>
</html>