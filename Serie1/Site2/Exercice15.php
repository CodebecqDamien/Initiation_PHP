<?php
$numbers = [];
for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(0, 100);
}

$lessThan50 = [];
$greaterOrEqual50 = [];

foreach ($numbers as $number) {
    if ($number < 50) {
        $lessThan50[] = $number;
    } else {
        $greaterOrEqual50[] = $number;
    }
}

echo "Valeurs inférieures à 50:\n";
print_r($lessThan50);

echo "Valeurs supérieures ou égales à 50:\n";
print_r($greaterOrEqual50);
?>