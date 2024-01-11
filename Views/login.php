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
                            <p class="text-center">Unlock WikiGenius. Smarter insights await!</p>

                            <form id="loginForm" onsubmit="return validateForm()" action='auth/login' method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Username<span
                                            style="color: red">*</span></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="Entrer your name">
                                    <span id="usernameError" class="text-danger"></span>
                                </div>
                                <div class="mb-4 input-group input-group-merge">
                                    <label for="password" class="form-label">Password<span
                                            style="color: red">*</span></label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="••••••••" aria-describedby="passwordToggle">
                                        <span class="input-group-text cursor-pointer" id="passwordToggle"
                                            onclick="togglePasswordVisibility()">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                        <span id="passwordError" class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value=""
                                            id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Remeber this Device
                                        </label>
                                    </div>
                                    <a class="text-primary fw-bold" href="./index.html">Forgot Password ?</a>
                                </div>
                                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="button"
                                    onclick="submitForm()">Sign Up</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold mr-1">New to WikiGenius?</p>
                                    <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an
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
