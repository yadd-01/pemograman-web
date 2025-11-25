<!DOCTYPE html>
<html>
<head>
    <title>Hitung Saldo Akhir</title>
</head>
<body>
    <h3>Program Hitung Saldo Bank</h3>
    <form method="post" action="">
        Saldo Awal (Rp): <input type="number" name="saldo_awal" value="1000000" required><br><br>
        Jangka Waktu (Bulan): <input type="number" name="bulan" value="12" required><br><br>
        <input type="submit" name="hitung" value="Hitung Saldo">
    </form>
    <hr>

    <?php
    if (isset($_POST['hitung'])) {
        $saldo = $_POST['saldo_awal'];
        $jangka_waktu = $_POST['bulan'];
        
        echo "Saldo Awal: Rp. " . number_format($saldo, 0, ',', '.') . "<br>";
        echo "Jangka Waktu: " . $jangka_waktu . " bulan<br><br>";

        // Looping sebanyak N bulan
        for ($i = 1; $i <= $jangka_waktu; $i++) {
            
            // Cek kondisi bunga berdasarkan saldo saat ini
            if ($saldo < 1100000) {
                // Bunga 3% per tahun (dibagi 12 untuk bulan)
                $bunga = $saldo * (0.03 / 12);
            } else {
                // Bunga 4% per tahun (dibagi 12 untuk bulan)
                $bunga = $saldo * (0.04 / 12);
            }

            // Tambah bunga, kurangi admin
            $saldo = $saldo + $bunga - 9000;
        }

        echo "<b>Saldo Akhir setelah $jangka_waktu bulan adalah: Rp. " . number_format($saldo, 2, ',', '.') . "</b>";
    }
    ?>
</body>
</html>