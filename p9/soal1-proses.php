<html>
<head>
    <title>Hasil Perhitungan Saldo</title>
</head>
<body>
    <h1>Hasil Perhitungan Saldo Akhir</h1>

    <?php
        // Membaca data input dari form
        $saldoAwal = $_POST['saldo_awal'];
        $bunga_persen = $_POST['bunga'];
        $bulan = $_POST['bulan'];

        // Mengubah bunga dari format persen (misal: 0.25) ke format desimal (0.0025)
        $bunga_decimal = $bunga_persen / 100;

        // Rumus perhitungan saldo akhir (diambil dari kode Anda)
        $saldoAkhir = $saldoAwal * (1 + ($bunga_decimal * $bulan));

        // Menampilkan data yang diinput
        echo "<p>Saldo Awal : Rp. ".number_format($saldoAwal, 0, ',', '.').",-</p>";
        echo "<p>Bunga Perbulan : ".$bunga_persen." %</p>";
        echo "<p>Lama Menabung : ".$bulan." bulan</p>";
        echo "<hr>";
        
        // Menampilkan hasil perhitungan
        echo "<p><b>Saldo akhir setelah ".$bulan." bulan adalah : Rp. ".number_format($saldoAkhir, 0, ',', '.').",-</b></p>";
    ?>

</body>
</html>