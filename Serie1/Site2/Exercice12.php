<?php
$variable = 0;

while ($variable <= 20) {
    if ($variable == 10) {
        echo "<strong>$variable</strong><br>";
    } else {
        echo "$variable<br>";
    }
    $variable += 2;
}
?>