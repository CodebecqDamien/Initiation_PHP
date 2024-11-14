<?php 
    $nb_lignes = 10;
    function triangle($nb_lignes){
        for($i = 0; $i < $nb_lignes; $i++){
            for($j = 0; $j <= $i; $j++){
                echo '*';
            }
            echo '<br>';
        }
    }
    triangle($nb_lignes);
?>