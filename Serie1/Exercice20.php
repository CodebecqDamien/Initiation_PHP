<?php
$title = 'Capitale';
$list = array('Paris', 'Berlin', 'Moscou');

function listHTML($title, $list) {
    // Vérifie si le titre ou la liste sont null ou vides
    if (empty($title) || empty($list)) {
        return null;
    }

    // Initialise la chaîne HTML
    $html = '<h3>' . htmlspecialchars($title) . '</h3><ul>';
    
    // Ajoute chaque élément de la liste à la chaîne HTML
    foreach ($list as $item) {
        $html .= '<li>' . htmlspecialchars($item) . '</li>';
    }
    
    // Ferme la liste
    $html .= '</ul>';
    
    return $html;
}
echo listHTML($title, $list);

?>