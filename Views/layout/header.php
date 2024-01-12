<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>WikiGenius</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Favicon -->
    <link href="<?= APP_URL ?>public/assets/img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Flaticon Font -->
    <link href="<?= APP_URL ?>public/assets/lib/flaticon/font/flaticon.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="<?= APP_URL ?>public/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?= APP_URL ?>public/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= APP_URL ?>public/assets/css/style.css" rel="stylesheet" />
    
  </head>

  <body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
      <nav
        class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5"
      >
        <a
          href=""
          class="navbar-brand font-weight-bold text-secondary"
          style="font-size: 36px"
        >
          <i class="fa-solid fa-book-open-reader"></i>
          <span class="text-primary">WikiGenius</span>
        </a>
        <button
          type="button"
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarCollapse"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarCollapse"
        >
          <div class="navbar-nav font-weight-bold mx-auto py-0">
            <a href="<?= APP_URL ?>" class="nav-item nav-link active">Home</a>
            <a href="<?= APP_URL ?>wiki" class="nav-item nav-link">wikis</a>
            <a href="<?= APP_URL ?>about" class="nav-item nav-link">About</a>
            <a href="<?= APP_URL ?>contact" class="nav-item nav-link">Contact</a>
          </div>
          <a href="<?= APP_URL ?>login" class="btn btn-primary px-4 mr-3">Log in</a>
          <a href="<?= APP_URL ?>signup" class="btn btn-primary px-4">Sign up</a>

          <li class="nav-item dropdown pe-3 list-inline">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= APP_URL ?>public/assets/img/testimonial-2.jpg" alt="Profile" class="rounded-circle" style="width: 3rem">
            <span class="d-none d-md-block dropdown-toggle ps-2 fw-bold ml-2" style="font-weight: 700;">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header text-center">
              <h6>Mohamed El Morjani</h6>
              <span>info@gmail.com</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
        </div>
      </nav>
    </div>
    <!-- Navbar End -->