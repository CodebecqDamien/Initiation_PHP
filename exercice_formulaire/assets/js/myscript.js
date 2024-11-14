function verifierFormulaire() {
    // Récupérer les éléments du formulaire
    var nom = document.getElementsByName('name')[0];
    var prénom = document.getElementsByName('prénom')[0];
    var email = document.getElementsByName('email')[0];
    var password = document.getElementsByName('password')[0];
    var message = document.getElementsByName('message')[0];
    var ageCheckbox = document.getElementById('formCheck-1');
    var passwordMessage = password.nextElementSibling; // Message d'erreur pour le mot de passe
    var ageLabel = document.querySelector('label[for="formCheck-1"]'); // Récupérer le label associé à la checkbox

    // Réinitialiser les erreurs précédentes
    resetErrors();

    var isValid = true;

    // Validation du nom
    if (nom.value === '') {
        nom.style.borderColor = 'red';
        isValid = false;
    } else {
        nom.style.borderColor = 'green'; // Champ valide
    }

    // Validation du prénom
    if (prénom.value === '') {
        prénom.style.borderColor = 'red';
        isValid = false;
    } else {
        prénom.style.borderColor = 'green'; // Champ valide
    }

    // Validation de l'email
    if (email.value === '' || !validateEmail(email.value)) {
        email.style.borderColor = 'red';
        isValid = false;
    } else {
        email.style.borderColor = 'green'; // Champ valide
    }

    // Validation du mot de passe
    if (password.value.length < 8) {
        password.style.borderColor = 'red';
        passwordMessage.classList.remove('invisible');
        isValid = false;
    } else {
        password.style.borderColor = 'green'; // Champ valide
        passwordMessage.classList.add('invisible');
    }

    // Validation du message
    if (message.value === '') {
        message.style.borderColor = 'red';
        isValid = false;
    } else {
        message.style.borderColor = 'green'; // Champ valide
    }

    // Validation de la case "I am of age"
    if (!ageCheckbox.checked) {
        ageCheckbox.style.borderColor = 'red'; // Changer la bordure de la checkbox
        ageLabel.style.color = 'red'; // Changer la couleur du texte du label en rouge
        isValid = false;
    } else {
        ageCheckbox.style.borderColor = 'green'; // Case valide
        ageLabel.style.color = 'green'; // Label valide
    }

    if (isValid) {
        alert('Formulaire valide, soumission possible !');
    }
}

// Fonction pour réinitialiser les erreurs de validation
function resetErrors() {
    var inputs = document.querySelectorAll('.form-control');
    inputs.forEach(function(input) {
        input.style.borderColor = ''; // Réinitialiser la bordure à la couleur par défaut
    });

    var passwordMessage = document.querySelector('.text-danger');
    if (passwordMessage) {
        passwordMessage.classList.add('invisible');
    }

    // Réinitialiser la couleur de la checkbox et du label
    var ageCheckbox = document.getElementById('formCheck-1');
    var ageLabel = document.querySelector('label[for="formCheck-1"]');
    ageCheckbox.style.borderColor = ''; // Réinitialiser la bordure de la checkbox
    ageLabel.style.color = ''; // Réinitialiser la couleur du label
}

// Fonction pour valider un email
function validateEmail(email) {
    var re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
}
