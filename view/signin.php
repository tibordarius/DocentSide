
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google-signin-client_id" content="386290369432-apops34elv931sovs3demr1r8dmprru1.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="icon" href="../../favicon.ico">
    <title>IJburg College - Sign In</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/signin.css" rel="stylesheet" type="text/css"/>
    <script src="/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>
    <div class="container">
      <form action="../app/controller/action_login.php" method="post" target="_top" class="form-signin">
        <div class="imgcontainer">
            <img src="IJburg.png" alt="Avatar" class="avatar">
        </div>
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="uname">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="psw">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <div class="g-signin2" position="center" padding="10px" data-onsuccess="onSignIn"></div>
      </form>

    </div> <!-- /container -->
  </body>
</html>
