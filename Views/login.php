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
                            <a href="<?= APP_URL ?>"
                                class="text-nowrap logo-img text-center font-weight-bold text-primary d-block py-3 w-100"
                                style="font-size: 40px; line-height: 40px; text-decoration: none;">
                                <i class="fa-solid fa-book-open-reader"></i>
                                <span style="color: #17A2B8;">WikiGenius</span>
                            </a>
                            <p class="text-center">Unlock WikiGenius. Smarter insights await!</p>

                            <?php if (isset($_SESSION['flash_message']) && isset($_SESSION['flash_type'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['flash_type']; ?> alert-dismissible fade show"
                                    role="alert">
                                    <strong>
                                        <?php echo ucfirst($_SESSION['flash_type']); ?>!
                                    </strong>
                                    <?php echo $_SESSION['flash_message']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                            aria-hidden="true">&times;</span> </button>
                                </div>
                                <?php
                                unset($_SESSION['flash_message']);
                                unset($_SESSION['flash_type']);
                            endif;
                            ?>
                            
                            <form id="loginForm" onsubmit="return continueFormValidation()" action='auth/login'
                                method="post">
                                <div class="mb-3">
                                    <label for="username_or_email" class="form-label">Username or Email<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="username_or_email"
                                        name="username_or_email" placeholder="Enter your username or email"
                                        value="<?php echo isset($_COOKIE['username_or_email']) ? $_COOKIE['username_or_email'] : ''; ?>">
                                    <span id="usernameError" class="text-danger"></span>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password<span
                                            style="color: red">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="••••••••" aria-describedby="passwordToggle">
                                    <span id="passwordError" class="text-danger"></span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value="" id="rememberMe"
                                            <?php echo isset($_COOKIE['username_or_email']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label text-dark" for="rememberMe">
                                            Remember this Device
                                        </label>
                                    </div>
                                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                                </div>

                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="button"
                                    onclick="submitForm()">Sign Up</button>

                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold mr-1">New to WikiGenius?</p>
                                    <a class="text-primary fw-bold ms-2" href="<?= APP_URL ?>signup">Create an
                                        account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= APP_URL?>public/assets/js/validator.js"></script>