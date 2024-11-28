<?php
    $tab = array(5,10,15);
    function dernierElementTableau($tab){
        if($tab == null){
            return null;
        }else{
            return $tab[count($tab)-1];
        }
    }

    echo dernierElementTableau($tab);
?>