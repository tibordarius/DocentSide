<?php 
    session_start();
        require_once '../google/config.php';
        session_start();
        if (!isset($_SESSION["user_id"]) && $_SESSION["user_id"] == "") {
            
        exit();}
        
        include './header.php';
?>

<div class="container-fluid">
      <div class="row">
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
              <div>
                  <div class="margin10"></div>
                  <?php if ($_SESSION["new_user"] == "yes") { ?>
                        <h2>Thank you <?php echo $_SESSION["name"] ?>, for registering with us!!!</h2>
                        <h5>Your email id is: <span style="text-decoration:underline;"><?php echo $_SESSION["email"]; ?></span></h5>
                  <?php } else { ?>
                        <h2>Welcome back <?php echo $_SESSION["name"] ?>!!!</h2>
                        <h5>Your email id is: <span style="text-decoration:underline;"><?php echo $_SESSION["email"]; ?></span></h5>
                  <?php } ?>
              </div>
          </div>
        </div>
      </div>
    </div>