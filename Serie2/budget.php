<?php
    
    function budget($budget, $achat){
        $reste = $budget - $achat;
        if($reste > 0){
            echo 'Il vous reste '.$reste.'€';
            return true;
        }else{
            echo 'Vous êtes à découvert de '.abs($reste).'€';
            return false;
        }
    }
?>