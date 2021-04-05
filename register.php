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
            $lengthPassword = strlen($_POST['password']);

            // if password equals the second input password = set password
            if($_POST['password'] === $_POST['confirmPassword']) {
                if($lengthPassword >= 6) {
                    $user->setPassword($_POST['password']);
                    $user->setConfirmPassword($_POST['confirmPassword']);
                    
                    /* checks if email or username is taken + register user */
                    if($user->emailExists() == false) {
                            $errorEmailExists = true;
                    }elseif($user->usernameExists() == false){
                            $errorUsernameExists = true;
                    }else{
                            $user->registerUser(); 
                    }
                }else{
                    $errorLengthPw = true;
                }       
            }else{
                $errorPassword = true;
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
    <link rel="stylesheet" href="css/style-feed.css"> 
    <link rel="stylesheet" href="css/style-profile.css">
    <link rel="stylesheet" href="css/style-header.css">
    <title>Register</title>
</head>
<body>

    <div class="container-fluid feed-header">
                <div class="row justify-content-center">
                    <img src="img/plantstagram-logo.png" class="plant-logo justify-content-center">
                </div>
    </div>

    <div class="container-fluid ">
        <div class="register-form">
            <form action="" method="post">
                <div class="formLayout">
                <h2 class="text-center">Register on Plantstagram</h2> 
    
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
                    <input  type="submit" value="Register"class="btn btn-primary"></button>
                </div>
                
                </div>

                <!--errors-->
                <?php if(isset($errorEmailExists)):?>
                    <div class="alert alert-danger">Sorry, the email you've entered is already taken.</div>
                <?php endif; ?>

                <?php if(isset($errorUsernameExists)):?>
                    <div class="alert alert-danger">The username you've entered is already taken.</div>
                <?php endif; ?>

                <?php if(isset($errorLengthPw)):?>
                    <div class="alert alert-danger">Password must contain more than 5 characters.</div>
                <?php endif; ?>

                <?php if(isset($errorPassword)):?>
                    <div class="alert alert-danger">Sorry, your password is incorrect, please try again.</div>
                <?php endif; ?>

            </form>

            <div>
                <p class="text-center">Already have an account on Plantstagram?</p>
                <a href="login.php"><button class="btn btn-register btn-primary">Login</button></a>
            </div>
        </div>
    </div>  
    
</body>
</html>