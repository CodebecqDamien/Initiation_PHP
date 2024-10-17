<?php 
$budget = 1553.89;
$achat = 1554.76;
if($achat > $budget) {
    echo 'Vous n\'avez pas assez d\'argent pour effectuer cet achat.';
}
else {
    echo 'Achat effectué.';
}
?>