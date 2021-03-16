<?php
    include_once(__DIR__ . "/connection.php");
    session_start();

    //test connection
    $conn = \Database::getConn();
    $statement = $conn->prepare("select * from users");
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($users);

?> 
<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <div class="container-fluid ">
      <div class="row ">
        <div class="col-sm ">
          <div class="formLayout">
            <form  action="" method="post">
              <h1 class="form-title">Log in</h1>
              
              <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" id="username" name="username">
              </div>

              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password">
              </div>

              <div class="form-group">
                  <input type="submit" value="Log In" class="btn btn-primary">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
    


    
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>