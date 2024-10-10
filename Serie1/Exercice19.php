<?php
    $pays ='Maroc';
    function capital($pays){
        switch($pays):
            case $pays == 'France':
                return 'Paris';
            case $pays == 'Allemagne':
                return 'Berlin';
            case $pays == 'Italie':
                return 'Rome';
            case $pays == 'Maroc':
                return 'Rabat';
            case $pays == 'Espagne':
                return 'Madrid';
            case $pays == 'Portugal':
                return 'Lisbonne';
            case $pays == 'Angleterre':
                return 'Londres';
            default :
                return'Inconnu';
            endswitch;
    }

    echo capital($pays);
?>