<?php
$a = 20;
$b = &$a;

echo "\$a = $a, \$b = $b";
echo "<br/>";
$a = $a + 5;
echo "\$a = $a, \$b = $b";
echo "<br/>";
$b = $b + 10;
echo "\$a = $a, \$b = $b";
?>