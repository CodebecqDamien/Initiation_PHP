<?php
    $Arg1 = 'Capitale';
    $Arg2 = array("Paris","Berlin","Moscou");

    function listHTML($Arg1, $Arg2){
        if($Arg1 == null && $Arg2 == null){
            return null;
        }else {
            return '<h3>'.$Arg1.'</h3><ul><li>'.$Arg2[0].'</li><li>'.$Arg2[1].'</li><li>'.$Arg2[2].'</li></ul>';
        }
    }
?>