<?php
$hitung = 0;
$bil = 3;
while ($bil <= 127) {
    if ($bil % 6 == 0) $hitung = $hitung + 1;
    $bil++;
}
echo "Banyaknya bilangan bulat adalah ".$hitung;
?>