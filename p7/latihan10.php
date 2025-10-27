<html>
<head>
    <title>Menghitung Gaji Bersih Karyawan</title>
</head>
<body>
    <h1>Menghitung Gaji Bersih Karyawan</h1>
    <?php
    $gajipokok = 1000000;
    $tunjangan = 500000;
    $gajikotor = $gajipokok + $tunjangan;
    $pajak = 0.15 * $gajikotor;
    $gajibersih = $gajipokok + $tunjangan - $pajak;
    echo "<p>Gaji bersih karyawan adalah Rp. ".$gajibersih."</p>";
    
    $gajipokok = 1000000;
    $tunjangan = 500000;
    $gajikotor = $gajipokok + $tunjangan;
    $gajibersih = $gajikotor - (0.15 * $gajikotor);
    echo "<p>Gaji bersih karyawan adalah Rp. ".$gajibersih."</p>";
    
    $gajipokok = 1000000;
    $tunjangan = 500000;
    $gajibersih = $gajipokok + $tunjangan - 0.15 * ($gajipokok + $tunjangan);
    echo "<p>Gaji bersih karyawan adalah Rp. ".$gajibersih."</p>";
    ?>
</body>
</html>