<?php
echo "<h3>Mencari Pasangan x + y + z = 25</h3>";

$jumlah_penyelesaian = 0;

// Loop tingkat 1 untuk x
for ($x = 1; $x <= 25; $x++) {
    
    // Loop tingkat 2 untuk y
    for ($y = 1; $y <= 25; $y++) {
        
        // Loop tingkat 3 untuk z
        for ($z = 1; $z <= 25; $z++) {
            
            // Cek apakah penjumlahannya sama dengan 25
            if (($x + $y + $z) == 25) {
                echo "x = $x, y = $y, z = $z <br />";
                $jumlah_penyelesaian++; // Tambah hitungan jika ketemu
            }
            
        }
    }
}

echo "<br />";
echo "<b>Jumlah penyelesaian : " . $jumlah_penyelesaian . "</b>";
?>