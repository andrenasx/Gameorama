<?php function draw_login() { ?>
<body class="d-flex justify-content-center">
    <section class="login-page d-flex justify-content-center">
        <div class="background-color"></div>
        <div class="background-image"></div>
        <main class="form-signin">
            <form>
                <img class="img-fluid" src="../assets/Logo.png" alt=""
                    onclick="window.location.href='home'" style="cursor:pointer;">
                <h1 class="h2 mb-5 fw-normal">The Panorama of Gaming</h1>
                <h2 class="h3 mb-4 fw-bold">Login</h2>
                <div class="form-floating mb-5">
                    <input type="email" id="inputEmail" class="form-control mb-3" placeholder=" " required>
                    <label for="inputEmail">Email address</label>
                </div>
                <div class="form-floating mb-0">
                    <input type="password" id="inputPassword" class="form-control mb-3" placeholder=" " required>
                    <label for="inputPassword">Password</label>
                </div>
                <a class="blue-hover mb-5" id="forgotPassword" href="login.php">Forgot your password?</a>
                <div class="col-12 mb-3 d-flex justify-content-center">
                    <button class="col-5 btn btn-lg btn-primary me-3" id="loginButton" type="submit" onclick="window.location.href='mainpage.php#'">Login</button>
                    <a class="col-5 btn btn-outline-dark" href="/users/googleauth" id="googleButton" role="button"
                        style="text-transform:none">
                        <img width="30px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                        Login with Google
                    </a>
                </div>
                <div class="row g-0 text-center">
                    <a class="blue-hover" id="signUpLogin" href="signup.php">Don't have an account? Sign Up</a>
                </div>
                <p class="mt-4 mb-1 text-center text-muted">&copy; Copyright 2021 Gameorama. All rights reserved.</p>
            </form>
        </main>
    </section>
</body>
<?php } ?>