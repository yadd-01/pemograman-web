<?php
$jumBaris = 10;
$jumKolom = 6;
echo "<table border='1'>";
for ($baris = 1; $baris <= $jumBaris; $baris++)
{
    echo "<tr>";
    for ($kolom = 1; $kolom <= $jumKolom; $kolom++)
    {
        echo"<td>...</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>