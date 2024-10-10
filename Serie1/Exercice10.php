<?php
    $Argument1 = 5 ;
    $Argument2 = 10 ;
    function plusGrand($Argument1, $Argument2){
        if ($Argument1 > $Argument2){
            return $Argument1;
        }
        else{
            return $Argument2;
        }
    }

    echo plusGrand($Argument1, $Argument2);
?>