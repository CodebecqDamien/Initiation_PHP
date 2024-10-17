<?php

include './libraryToInclude.php';

function getUtilisateursAutorises() {
    $utilisateurs = getAllUtilisateurs();

    $utilisateursAutorises = array_filter($utilisateurs, function($utilisateur) {

        return !$utilisateur->blocked && 
               !empty($utilisateur->email) && 
               $utilisateur->age >= 18;
    });

    return array_values($utilisateursAutorises);
}
echo getUtilisateursAutorises();
?>
