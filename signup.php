

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Sign up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/harvard2.png">
    

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="register.php" method="post" role="form" class="php-email-form">
    <img class="mb-4" src="assets/img/harvard2.png" alt="" width="200" height="200">
    <h1 class="h3 mb-3 fw-normal">Harvard University Portal</h1>
    <h2 class="h3 mb-3 fw-normal">Sign up</h2>
    <label for="inputName" class="visually-hidden">Name</label>
    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required >
    <label for="inputPhone" class="visually-hidden">Phone Number</label>
    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" required >
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required >

    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <label for="inputPassword2" class="visually-hidden">Input your password again</label>
    <input type="password" id="password2" name="password2" class="form-control" placeholder="Input your password again" required>
    <div class="checkbox mb-3">
      <label>
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
    
  </form>
  <p class="mt-5 mb-3 text-muted">Have account? </p>
  <a href="index.php" class="btn btn-primary">Click here</a>
</main>


    
  </body>
</html>
