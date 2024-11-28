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

    // Achage du mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Enregistrement des données dans un fichier data.json
    $data = array(
        'name' => $name,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $hashed_password,
        'message' => $message,
        'age' => $age_confirmation
    );

    // Lire le fichier data.json s'il existe, sinon créer un tableau vide
    if (file_exists('data.json')) {
        $json_data = file_get_contents('data.json');
        $existing_data = json_decode($json_data, true);
    } else {
        $existing_data = array();
    }

    // Vérifier si un utilisateur avec le même nom, prénom et email existe déjà
    $user_exists = false;
    foreach ($existing_data as $user) {
        if ($user['name'] === $name && $user['prenom'] === $prenom && $user['email'] === $email) {
            $user_exists = true;
            break;
        }
    }

    // Si l'utilisateur n'existe pas, ajouter les nouvelles données
    if (!$user_exists) {
        $existing_data[] = $data; // Ajouter l'utilisateur au tableau existant

        // Enregistrer les données mises à jour dans le fichier
        $data_json = json_encode($existing_data, JSON_PRETTY_PRINT);
        file_put_contents('data.json', $data_json);
        afficher_donnees($prenom, $name, $email, $message, $password, $age_confirmation);
    } else {
        afficher_compte_existant($prenom, $name);

    }
}
function afficher_donnees($prenom, $name, $email, $message, $password, $age_confirmation) {
    // Affichage dynamique et stylisé des données
    echo "
    <style>
        .container {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }

        .col-12 {
            margin-bottom: 20px;
        }

        h2 {
            color: #343a40;
            font-weight: bold;
        }

        p {
            font-size: 16px;
            color: #495057;
        }

        strong {
            color: #007bff;
        }
    </style>
    <h2 class='text-center'>Merci pour votre inscription !</h2>
    <div class='container'>
        <h2 class='text-center'>Données reçues :</h2>
        <div class='row'>
            <div class='col-12'>
                <p><strong>Nom :</strong> {$name}</p>
                <p><strong>Prénom :</strong> {$prenom}</p>
                <p><strong>Email :</strong> {$email}</p>
                <p><strong>Message :</strong> " . nl2br($message) . "</p>
                <p><strong>Password :</strong> " . (strlen($password) > 0 ? str_repeat('*', strlen($password)) : 'Non renseigné') . "</p>
                <p><strong>Confirmation d'âge :</strong> {$age_confirmation}</p>
            </div>
        </div>
    </div>";
} 

function afficher_compte_existant($prenom, $name) {
    // Affichage dynamique et stylisé des données
    echo "
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Hauteur égale à la fenêtre */
            background-color: #f0f4f9;
        }

        .container {
            background-color: #87a4fa;
            border-radius: 8px;
            padding: 20px;
            width: 50%; /* Largeur de la boîte (50% de la page) */
            height: 50%; /* Hauteur de la boîte (50% de la page) */
            max-width: 600px; /* Largeur maximale */
            display: flex; /* Utilisation de flexbox */
            flex-direction: column; /* Organise les enfants verticalement */
            justify-content: center; /* Centre les enfants verticalement */
            align-items: center; /* Centre les enfants horizontalement */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ajout d'une ombre pour le style */
            text-align: center; /* Centrer le contenu textuel */
            color: black;
        }

        h2 {
            font-weight: bold;
            font-size: 4rem; /* Taille de police */
            margin-bottom: 20px;
        }

        p {
            font-size: 2.5rem; /* Taille de police */
            margin: 10px 0;
        }
    </style>
    <div class='container'>
        <h2>Bonjour</h2>
        <div class='row'>
            <div class='col-12'>
                <p>{$name} {$prenom}</p>
            </div>
        </div>
    </div>";
}

?>
