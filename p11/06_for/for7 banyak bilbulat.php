<?php
$hitung = 0;
for ($bil = 3; $bil <= 127; $bil++)
{
    if ($bil % 6 == 0) $hitung = $hitung + 1;
}
echo "Banyaknya bilangan bulat adalah ".$hitung;
?>