<?php 
//include_once(__DIR__ . "/classes/User.php");

    /* if(!empty($_POST)){
        try {
            $user = new User();
            $user->setUsername();
            $user->setEmail();
            $user->setPassword();

            $user->saveUser();
            $regComplete = "Registration completed!"; //nog laten printen

        }catch(\Throwable $thr) {
            $error = $thr->getMessage(); //error laten printen
        }
    } */


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-sm ">
                <div class="formLayout">
                    <form  action="" method="post">
                    <h1 class="form-title">Register on Instagram</h1>

                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" id="email" name="email" placeholder="email@example.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" id="password" name="confirmpassword" placeholder="Confirm password">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-info">
                    </div>
                    
                </form>
                </div>
            </div>
            </div>

            <div class="col-sm formLayout border-line">
                <div>Already have an account on Instagram?</div>
                <div><button type="button" class="btn btn-primary"><a href="#">Login</a></button></div>
            </div>

        </div>
    
</body>
</html>