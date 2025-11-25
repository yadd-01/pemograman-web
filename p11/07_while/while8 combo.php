<?php
echo "<select name='tahun'>";
$tahun = 1950;
while ($tahun <= 2022) {
    echo "<option value='".$tahun."'>".$tahun."</option>";
    $tahun++;
}
echo "</select>";
?>