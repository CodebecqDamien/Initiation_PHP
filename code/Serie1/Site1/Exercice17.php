<?php
    $password='BonjourDamien';
    function verificationPassword($password){
        if(strlen($password) >= 8){
            return true;
        }else{
            return false;
        }
    }

    echo verificationPassword($password);
?>