<?php 
 include_once(__DIR__ . "/classes/Db.php");

    if(!empty($_POST)){
        try {        
            include_once(__DIR__ . "/classes/User.php");
            // creates a new user object
            $user = new User();

            // set data for user
            $user->setEmail($_POST['email']);
            $user->setUsername($_POST['username']);
            
            if($_POST['password'] === $_POST['confirmPassword'] ) { // if password equals the second input password set password
                $user->setPassword($_POST['password']);
                $user->setConfirmPassword($_POST['confirmPassword']);
                //$count = strlen($_POST['password']); checken of het meer dan ... karakters heeft
                
                // register user in database & start session & redirect to FEED 
                $user->registerUser();
                session_start(); 
                //setcookie("CHECK", "", time() + 60 * 60 * 24 * 7); //SET COOKIE moet nog aangepast worden later eens login is aangepast
                $_SESSION['email'] = $user->getEmail();
                //header("Location: login.php"); // moet nog aangepast worden van locatie (tenzij...)
            }else{
                $error = true;
            }
        }
        catch(Throwable $error) {
            $error = $error->getMessage();
        }  
    }

?> <!DOCTYPE html>
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
                            <input type="text" id="email" name="email" placeholder="Email" class="form-control" aria-describedby="emailHelp">
                        </div>
                        
                        <div class="form-group">
                            <input type="text" id="username" name="username" placeholder="Username">
                        </div>

                        <div class="form-group">
                            <input type="password" id="password" name="password" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <input type="password" id="password" name="confirmPassword" placeholder="Confirm password">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Register" class="btn btn-primary">
                        </div>

                        <?php if(isset($error)):?>
                            <div class="alert alert-danger">Sorry, your password or email is incorrect, please try again.</div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
            </div>

            <div class="col-sm formLayout border-line">
                <div>Already have an account on Instagram?</div>
                <div><button type="button" class="btn btn-primary"><a href="">Login</a></button></div>
            </div>

        </div>
    
</body>
</html>