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
      <div class="row ">
        <div class="col-sm ">
          <div class="formLayout">

            <form method="post" action="" >
              <h1 class="form-title">Instagram</h1>
              
              <div class="form-group">
                  <input type="text" id="username" name="username" placeholder="Username">
              </div>

              <div class="form-group">
                  <input type="password" id="password" name="password" placeholder="Password">
              </div>

              <div class="form-group">
                  <input type="submit" value="Log In" class="btn btn-primary">
              </div>
              
              <?php if(isset($error)):?>
                  <div class="alert alert-danger">Sorry, your password or email is incorrect, please try again.</div>
              <?php endif; ?>

          </form>
        </div>
      </div>
    </div>

    <div class="col-sm formLayout border-line">
      <div>Don't have an account yet?</div>
      <button type="button" class="btn btn-primary"><a href="register.php">Register</a></button>
    </div>

  </div>
    
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>