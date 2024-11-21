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

    // Enregistrement des données dans un fichier data.json
    $data = array(
        'name' => $name,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password,
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
        echo "Utilisateur ajouté avec succès.";
    } else {
        echo "Un utilisateur avec ce nom, prénom et email existe déjà.";
    }


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
?>
