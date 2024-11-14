<?php
function remplacerLesLettres($Object) {
    $recherche = array('e', 'o', 'i');
    $remplacement = array('3', '0', '1');
    $nouvelleChaine = str_replace($recherche, $remplacement, $Object);
    return $nouvelleChaine; 
}
echo remplacerLesLettres('bonjour les amis');
?>