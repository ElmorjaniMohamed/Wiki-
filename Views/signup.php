<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" style="background-color: #17A2B8">
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-4 p-3 col-xxl-3">
                    <div class="card mb-0" style="border-radius: 0.7rem;">
                        <div class="card-body">
                            <a href="./index.html"
                                class="text-nowrap logo-img text-center font-weight-bold text-primary d-block py-3 w-100"
                                style="font-size: 40px; line-height: 40px; text-decoration: none;">
                                <i class="fa-solid fa-book-open-reader"></i>
                                <span style="color: #17A2B8;">WikiGenius</span>
                            </a>
                            <p class="text-center">WikiGenius Welcomes You!</p>
                            <form id="registrationForm" onsubmit="return validateForm();" action="/register" method="POST">
                                <div id="formSuccess" class="success-message"></div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label text-dark">Username<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="username" placeholder="Enter your name"
                                        oninput="clearMessages()">
                                    <span id="usernameError" class="error-message text-danger"></span>
                                    <span id="usernameSuccess" class="success-message text-success"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Email<span
                                            style="color: red">*</span></label>
                                    <input type="email" class="form-control" id="email" required
                                        placeholder="Enter your email" oninput="clearMessages()">
                                    <span id="emailError" class="error-message text-danger"></span>
                                    <span id="emailSuccess" class="success-message text-success"></span>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label text-dark">Password<span
                                            style="color: red">*</span></label>
                                    <input type="password" class="form-control" id="password" placeholder="••••••••"
                                        required oninput="clearMessages()">
                                    <span id="passwordError" class="error-message text-danger"></span>
                                    <span id="passwordSuccess" class="success-message text-success"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputImage" class="form-label text-dark">Profile Image (JPG, PNG,
                                        SVG)</label>
                                    <input type="file" class="form-control" id="exampleInputImage"
                                        accept=".jpg, .jpeg, .png, .svg">
                                    <span id="imageError" class="error-message text-danger"></span>
                                    <span id="imageSuccess" class="success-message text-success"></span>
                                </div>
                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit"
                                    onclick="insertForm()">Sign Up</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold mr-1">Already have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Sign
                                        Up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateImage() {
  var imageInput = document.getElementById("exampleInputImage");
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

function insertForm() {
  var formData = new FormData(document.getElementById("registrationForm"));

  $.ajax({
    url: "/register/auth",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      console.log("Formulaire soumis avec succès!", response);
      displaySuccessMessage("Formulaire soumis avec succès!", "formSuccess");
    },
    error: function (error) {
      console.error("Erreur lors de la soumission du formulaire", error);
      displayErrorMessage(
        "Erreur lors de la soumission du formulaire. Veuillez réessayer plus tard.",
        "formError"
      );
    },
  });
}
</script>