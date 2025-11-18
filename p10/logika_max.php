<?php
$bil1 = 6;
$bil2 = 9;
$bil3 = 10;
if ($bil1 > $bil2) {
    $max = $bil1;
}
else {
    $max = $bil2;
}
if ($max > $bil3) {
    $maxSemua = $max;
}
else {
    $maxSemua = $bil3;
}
echo "Nilai terbesar dari ketiga bilangan adalah ".$maxSemua;
?>