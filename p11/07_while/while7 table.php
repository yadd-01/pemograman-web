<?php
$jumBaris = 10;
$jumKolom = 6;
echo "<table border='1'>";
$baris = 1;
while ($baris <= $jumBaris) {
    echo "<tr>";
    $kolom = 1;
    while ($kolom <= $jumKolom) {
        echo"<td>...</td>";
        $kolom++;
    }
    echo "</tr>";
    $baris++;
}
echo "</table>";
?>