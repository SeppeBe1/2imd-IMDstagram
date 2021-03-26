<?php
    include_once(__DIR__ . "/classes/User.php");
    include_once(__DIR__ . "/classes/Db.php");
    session_start();

    $options = [
      'cost' => 15
    ];

    try {
      if(!empty($_POST)){
        $user = new User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user->setUsername($username);
        $user->setPassword($password);
      
          if($user->canLogin($username, $password)){
            $crypt = password_hash($password, PASSWORD_DEFAULT, $options); //hash password
            setcookie("helloCookie", $crypt, time() + 60 * 60 * 24 * 7);//sets cookie for a week
            $_SESSION["user"] = $username;
            header("location: index.html"); // redirect moet nog aangepast w
          } else {
            $error = true;
          }
      }
    } catch(Throwable $error) {
      $error = $error->getMessage();
    }


?> <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <div class="container-fluid">
          <div class="login-form">
            <form action="" method="post">
              <div class="formLayout">
                <h1 class="text-center form-title">Instagram</h2>       
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