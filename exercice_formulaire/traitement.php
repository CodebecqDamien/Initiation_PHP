<?php
// Sécurisation des données avec htmlspecialchars pour éviter les attaques XSS
function sécuriser($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Vérifier si le formulaire a été envoyé via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire et sécurisation
    $name = isset($_POST['name']) ? sécuriser($_POST['name']) : '';
    $prenom = isset($_POST['prenom']) ? sécuriser($_POST['prenom']) : '';
    $email = isset($_POST['email']) ? sécuriser($_POST['email']) : '';
    $password = isset($_POST['password']) ? sécuriser($_POST['password']) : '';
    $message = isset($_POST['message']) ? sécuriser($_POST['message']) : '';
    $age_confirmation = isset($_POST['age_confirmation']) ? 'Oui' : 'Non';

    // Affichage dynamique et stylisé des données
    echo "<div class='container mt-5'>";
    echo "<h2 class='text-center'>Données reçues :</h2>";
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>Nom et Prénom</h4>";
    echo "<p><strong>Nom :</strong> " . $name . "</p>";
    echo "<p><strong>Prénom :</strong> " . $prenom . "</p>";
    
    echo "<h4 class='card-title'>Informations de contact</h4>";
    echo "<p><strong>Email :</strong> " . $email . "</p>";
    echo "<p><strong>Message :</strong> " . nl2br($message) . "</p>";

    echo "<h4 class='card-title'>Sécurité</h4>";
    echo "<p><strong>Password :</strong> " . (strlen($password) > 0 ? str_repeat('*', strlen($password)) : 'Non renseigné') . "</p>";

    echo "<h4 class='card-title'>Confirmation</h4>";
    echo "<p><strong>I am of age :</strong> " . $age_confirmation . "</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
} else {
    echo "Aucune donnée envoyée.";
}
?>
