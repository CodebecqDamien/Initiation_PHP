<?php 
    include 'moyenne.php';
    include 'budget.php';

    $note = array(10, 12, 15, 18, 20);
    $budget = 2000;
    $achat = 550;

    echo 'La moyenne est de '.moyenne($note). '/20. '.'<br>';

    budget($budget, $achat);
?>