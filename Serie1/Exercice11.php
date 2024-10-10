<?php
    $Argument1 = 5 ;
    $Argument2 = 10 ;
    function plusPetit($Argument1, $Argument2){
        if ($Argument1 < $Argument2){
            return $Argument1;
        }
        else{
            return $Argument2;
        }
    }

    echo plusPetit($Argument1, $Argument2);
?>