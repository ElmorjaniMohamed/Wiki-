function continueFormValidation() {
    var usernameOrEmail = document.getElementById('username_or_email').value;
    var password = document.getElementById('password').value;

    document.getElementById('usernameError').innerText = '';
    document.getElementById('passwordError').innerText = '';

    if (usernameOrEmail.trim() === '') {
        document.getElementById('usernameError').innerText = 'Username or email is required.';
        return false;
    }

    if (password.trim() === '') {
        document.getElementById('passwordError').innerText = 'Password is required.';
        return false;
    }

    return true;
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var passwordIcon = document.querySelector('.input-group-text i');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('bx-hide');
        passwordIcon.classList.add('bx-show');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('bx-show');
        passwordIcon.classList.add('bx-hide');
    }
}

function submitForm() {
    if (continueFormValidation()) {

        var rememberMeCheckbox = document.getElementById('rememberMe');
        if (rememberMeCheckbox.checked) {
            var usernameOrEmail = document.getElementById('username_or_email').value;
            document.cookie = 'username_or_email=' + usernameOrEmail + '; expires=';
        }

        document.getElementById('loginForm').submit();
    }
}



//sign up
function validateImage() {
    var imageInput = document.getElementById("image");
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.svg)$/i;

    if (!allowedExtensions.exec(imageInput.value)) {
        displayErrorMessage(
            "Veuillez sélectionner un fichier avec une extension valide (JPG, JPEG, PNG, SVG).",
            "imageError"
        );
        return false;
    } else {
        displaySuccessMessage("Image valide", "imageSuccess");
        return true;
    }
}

function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Clear previous error and success messages
    clearMessages();

    // Simple validation example (you can customize based on your needs)
    if (username.trim() === "") {
        displayErrorMessage(
            "Veuillez entrer un nom d'utilisateur",
            "usernameError"
        );
        return false;
    } else if (!isValidUsername(username)) {
        displayErrorMessage(
            "Seules les lettres et les espaces blancs sont autorisés",
            "usernameError"
        );
        return false;
    } else {
        displaySuccessMessage("Nom d'utilisateur valide", "usernameSuccess");
    }

    if (email.trim() === "") {
        displayErrorMessage("Veuillez entrer une adresse e-mail", "emailError");
        return false;
    } else {
        displaySuccessMessage("E-mail valide", "emailSuccess");
    }

    if (password.trim() === "") {
        displayErrorMessage("Veuillez entrer un mot de passe", "passwordError");
        return false;
    } else if (!isValidPassword(password)) {
        displayErrorMessage(
            "Le mot de passe doit comporter au moins 8 caractères et contenir au moins une lettre majuscule, une lettre minuscule et un chiffre.",
            "passwordError"
        );
        return false;
    } else {
        displaySuccessMessage("Mot de passe valide", "passwordSuccess");
    }

    // Validation de l'image
    var isImageValid = validateImage();

    // Si la validation de l'image échoue, retourner false
    if (!isImageValid) {
        return false;
    }

    // If all validations pass, display success message and return true to submit the form
    displaySuccessMessage("Formulaire soumis avec succès!", "formSuccess");
    submitForm(); // Appel à la fonction d'envoi du formulaire
    return true;
}

function isValidPassword(password) {
    var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return passwordRegex.test(password);
}

function isValidUsername(username) {
    var usernameRegex = /^[a-zA-Z-' ]*$/;
    return usernameRegex.test(username);
}

function displayErrorMessage(message, fieldId) {
    var errorMessageSpan = document.getElementById(fieldId);
    errorMessageSpan.innerText = message;
    errorMessageSpan.classList.add("error-message", "text-danger");
}

function displaySuccessMessage(message, fieldId) {
    var successMessageSpan = document.getElementById(fieldId);
    successMessageSpan.innerText = message;
    successMessageSpan.classList.add("success-message", "text-success");
}

function clearMessages() {
    var messageElements = document.querySelectorAll(
        ".error-message, .success-message"
    );
    messageElements.forEach(function (element) {
        element.innerText = "";
        element.classList.remove(
            "error-message",
            "success-message",
            "text-danger",
            "text-success"
        );
    });
}