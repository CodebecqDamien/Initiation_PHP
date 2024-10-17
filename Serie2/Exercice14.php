<?php
$numbers = [];

for ($i = 0; $i < 10; $i++) {
    $numbers[] = rand(1, 100);
}

if (in_array(42, $numbers)) {
    echo "Le chiffre 42 est dans le tableau.\n";
} else {
    echo "Le chiffre 42 n'est pas dans le tableau.\n";
}

var_dump($numbers);
?>