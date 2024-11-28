<?php
    $tab= array(88,17,9,66,14);
    function plusPetit($tab){
        if($tab == null){
            return null;
        }else{
            $pp=$tab[0];
            for($i=0; $i<count($tab); $i++){
                if($tab[$i]<$pp){
                    $pp = $tab[$i];
                }
            }
        }
        return $pp;
    }

    echo plusPetit($tab);
?>