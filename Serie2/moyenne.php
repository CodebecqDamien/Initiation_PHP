<?php
    function moyenne($note){
        $somme = 0;
        $nb = count($note);
        for($i = 0; $i < $nb; $i++){
            $somme += $note[$i];
        }
        return $somme / $nb;
    }

?>