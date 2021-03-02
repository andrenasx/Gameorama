<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../css/main.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="login-page d-flex justify-content-center">
      <div class= "background-color"></div>
      <div class= "background-image"></div>
      <main class="form-signin">
        <form>
          <img class="img-fluid" src="../assets/Logo.png" alt="">
          <h1 class="h2 mb-5 fw-normal">The Panorama of Gaming</h1>
          <h2 class="h3 mb-4 fw-bold">Login</h1>
          <div class="form-floating mb-5">
            <input type="email" id="inputEmail" class="form-control mb-3" placeholder="name@example.com" required autofocus>
            <label for="inputEmail">Email address</label>
          </div>
          <div class="form-floating mb-5">
            <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required>
            <label for="inputPassword">Password</label>
          </div>
          <button class="w-50 btn btn-lg btn-primary" id="loginButton" type="submit">Login</button>
          <p class="mt-5 mb-1 text-muted">&copy; LBAW 2021</p>
        </form>
      </main>
    </div>
  </body>
</html>
