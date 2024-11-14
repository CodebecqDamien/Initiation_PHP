<?php
    $tab= array(8,17,9,66,14);
    function plusGrand($tab){
        if($tab == null){
            return null;
        }else{
            $pg=0;
            for($i=0; $i<count($tab); $i++){
                if($tab[$i]>$pg){
                    $pg = $tab[$i];
                }
            }
            return $pg;
        }
    }

    echo plusGrand($tab);
?>