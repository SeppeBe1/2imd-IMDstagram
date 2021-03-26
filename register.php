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
        <div class="register-form">
            <form action="" method="post">
                <div class="formLayout">
                <h2 class="text-center">Register on Instagram</h2> 
    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required="required">
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"  required="required">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"  required="required">
                </div>

                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmPassword"  required="required">
                </div>

                <div class="form-group btn-submit">
                    <input  type="submit" value="Registreer"class="btn btn-primary"></button>
                </div>
                
                </div>

                <?php if(isset($error)):?>
                    <div class="alert alert-danger">Sorry, your password or email is incorrect, please try again.</div>
                <?php endif; ?>       
            </form>

            <div>
                <p class="text-center">Already have an account on Instagram?</p>
                <a href="login.php"><button class="btn btn-register btn-primary">Login</button></a>
            </div>
        </div>
    </div>  
    
</body>
</html>