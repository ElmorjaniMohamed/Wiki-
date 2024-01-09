(function ($) {
  "use strict";

  // Dropdown on mouse hover
  $(document).ready(function () {
    function toggleNavbarMethod() {
      if ($(window).width() > 992) {
        $(".navbar .dropdown")
          .on("mouseover", function () {
            $(".dropdown-toggle", this).trigger("click");
          })
          .on("mouseout", function () {
            $(".dropdown-toggle", this).trigger("click").blur();
          });
      } else {
        $(".navbar .dropdown").off("mouseover").off("mouseout");
      }
    }
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Portfolio isotope and filter
  var portfolioIsotope = $(".portfolio-container").isotope({
    itemSelector: ".portfolio-item",
    layoutMode: "fitRows",
  });

  $("#portfolio-flters li").on("click", function () {
    $("#portfolio-flters li").removeClass("active");
    $(this).addClass("active");

    portfolioIsotope.isotope({ filter: $(this).data("filter") });
  });

  // Post carousel
  $(".post-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    dots: false,
    loop: true,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
    },
  });

  // Testimonials carousel
  $(".testimonial-carousel").owlCarousel({
    center: true,
    autoplay: true,
    smartSpeed: 2000,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 3,
      },
    },
  });
})(jQuery);

//form validation Sign up

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
    url: "/register",
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

//form validation Log in 
function validateForm() {
  // Appeler le fichier PHP pour vérifier l'état de l'inscription
  $.ajax({
      type: 'GET',
      url: '', 
      success: function (response) {
          if (response === "User is already signed up.") {
              alert("You are already signed up. Please log in.");
          } else {
              // Si l'utilisateur n'est pas déjà inscrit, poursuivre avec la validation du formulaire
              continueFormValidation();
          }
      },
      error: function (error) {
          console.error('Erreur AJAX', error);
      }
  });

  // Empêcher le formulaire de se soumettre normalement
  return false;
}

function continueFormValidation() {
  // Récupérer les valeurs des champs
  var username = document.getElementById('username').value;
  var password = document.getElementById('password').value;

  // Réinitialiser les messages d'erreur
  document.getElementById('usernameError').innerText = '';
  document.getElementById('passwordError').innerText = '';

  // Valider les champs
  if (username.trim() === '') {
      document.getElementById('usernameError').innerText = 'Username is required.';
      return false;
  }

  if (password.trim() === '') {
      document.getElementById('passwordError').innerText = 'Password is required.';
      return false;
  }

  // Effectuer la validation côté serveur avec AJAX
  $.ajax({
      type: 'POST',
      url: '', 
      data: {
          username: username,
          password: password
      },
      success: function (response) {
          // Afficher la réponse du serveur (par exemple, message de succès ou d'erreur)
          document.getElementById('successMessage').innerText = response;
      },
      error: function (error) {
          console.error('Erreur AJAX', error);
      }
  });

  // Empêcher le formulaire de se soumettre normalement
  return false;
}

//password Show
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