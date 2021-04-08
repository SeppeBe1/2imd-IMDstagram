<?php
    namespace src;
    spl_autoload_register(); 
    session_start();
    
    try {
      if(!empty($_POST)){
        $user = new classes\User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user->setUsername($username);
        $user->setPassword($password);
        
          if($user->canLogin($username, $password)){
            return true;
          } else {
            $error = true;
          }
      }
    } catch(\Throwable $error) {
      $error = $error->getMessage();
    }

?> <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-feed.css"> 
    <link rel="stylesheet" href="css/style-profile.css">
    <link rel="stylesheet" href="css/style-header.css">
    <title>Login</title>
  </head>
  <body>

    <div class="container-fluid feed-header">
              <div class="row justify-content-center">
                  <img src="img/plantstagram-logo.png" class="plant-logo justify-content-center">
              </div>
    </div>

    <div class="container-fluid">
          <div class="login-form">
            <form action="" method="post">
              <div class="formLayout">
                <h1 class="text-center form-title">Plantstagram</h2>       
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username"  required="required">
                  </div>
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password"  required="required">
                  </div>
                  <div class="form-group btn-submit">
                      <input  type="submit" value="Login"class="btn btn-primary"></button>
                  </div>
                  <div class="text-center">
                      <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
                  </div> 
              </div>

              <?php if(isset($error)):?>
                  <div class="alert alert-danger">Sorry, your password or email is incorrect, please try again.</div>
              <?php endif; ?>
              
            </form>
        <div>
          <p class="text-center">Don't have an account yet?</p>
          <a href="register.php"><button class="btn btn-register btn-primary">Register</button></a>
        </div>
      </div>
              
 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>