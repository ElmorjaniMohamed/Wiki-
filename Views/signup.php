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
                            <p class="text-center">WikiGenius Welcomes You!</p>

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
                            
                            <form id="registrationForm" onsubmit="return validateForm();" action='auth/register'
                                method="post" enctype="multipart/form-data">
                                <div id="formSuccess" class="success-message"></div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label text-dark">Username<span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Enter your name" oninput="clearMessages()">
                                    <span id="usernameError" class="error-message text-danger"></span>
                                    <span id="usernameSuccess" class="success-message text-success"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Email<span
                                            style="color: red">*</span></label>
                                    <input type="email" class="form-control" id="email" required name="email"
                                        placeholder="Enter your email" oninput="clearMessages()">
                                    <span id="emailError" class="error-message text-danger"></span>
                                    <span id="emailSuccess" class="success-message text-success"></span>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label text-dark">Password<span
                                            style="color: red">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="••••••••" required oninput="clearMessages()">
                                    <span id="passwordError" class="error-message text-danger"></span>
                                    <span id="passwordSuccess" class="success-message text-success"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputImage" class="form-label text-dark">Profile Image (JPG, PNG,
                                        SVG)</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        accept=".jpg, .jpeg, .png, .svg" oninput="clearMessages()">
                                    <span id="imageError" class="error-message text-danger"></span>
                                    <span id="imageSuccess" class="success-message text-success"></span>
                                </div>
                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit"
                                    onclick="insertForm()">Sign Up</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold mr-1">Already have an Account?</p>
                                    <a class="text-primary fw-bold ms-2" href="<?= APP_URL ?>login">Sign
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

<script src="<?= APP_URL?>public/assets/js/validator.js"></script>