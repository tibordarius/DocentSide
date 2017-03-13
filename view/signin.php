
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="icon" href="../../favicon.ico">
    <title>IJburg College - Sign In</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="../css/font-awesome.css" rel="stylesheet">
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
      </form>
      <div class="form-signin form-signin-heading">
            <a class="btn btn-lg btn-primary btn-block btn-social btn-google-plus" href="../google/login.php">
                <i class="fa fa-google-plus"></i> Login with Google
             </a>
        </div>
    </div> 
  </body>
</html>
