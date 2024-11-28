<?php
    $password='BonjourDam1';
    function verificationPassword($password){
        $maj = false;
        $min = false;
        $chf = false;
        
        if(strlen($password) >= 8){
            for($i = 0; $i < strlen($password); $i++){
                if(ctype_upper($password[$i])){
                    $maj = true;
                } else if(ctype_lower($password[$i])){
                    $min = true;
                } else if(ctype_digit($password[$i])){
                    $chf = true;
                }
            }
        }
        
        if($maj && $min && $chf){
            return true;
        } else {
            return false;
        }
    }

    echo verificationPassword($password);
?>