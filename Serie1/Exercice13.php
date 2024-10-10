<?php
    $tab = array(5,10,15);
    function premierElementTableau($tab){
        if($tab == null){
            return null;
        }else{
            return $tab[0];
        }
    }
    echo premierElementTableau($tab);
?>