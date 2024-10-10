<?php
    $Argument1 = 5 ;
    $Argument2 = 10 ;
    $Argument3=7;
    function plusPetit($Argument1, $Argument2, $Argument3){
        if ($Argument1 < $Argument2 && $Argument1 < $Argument3){
            return $Argument1;
        }
        if ($Argument2 < $Argument1 && $Argument2 < $Argument3){
            return $Argument2;
        }
        else{
            return $Argument3;
        }
    }

    echo plusPetit($Argument1, $Argument2, $Argument3);
?>