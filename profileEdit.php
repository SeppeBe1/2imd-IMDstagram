<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");
    session_start();


    $email = $_POST['email'];
    $username = $_SESSION['user'];

    try{
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $user = new classes\User();
            $user->changeEmail($email, $username);
                
        } else{
            echo "geen bestaande email";
        }
    } catch(\Throwable $error) {
        $error = $error->getMessage();
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style-profileEdit.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>

    <title>Edit profile</title>
</head>
<body>
    <main>
        <div class="container container-profile-edit clearfix">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h6 class="fw-bold border-bottom ">Profile settings</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span class="border-bottom "></span>
                </div>
            </div>
           

            <div class="container-fluid ">
                
                <div class="row ">
                    <div class="col-12 col-md-3 text-center">
                        <a href="#">
                            <img src="https://images.pexels.com/photos/3101767/pexels-photo-3101767.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="profile-pic-profile ">
                        </a>
                    </div>
                </div>


                
                <div class="row container-profilePic">
                    <div class="col-6 col-md-3">
                    
                        <div class="file btn upload-btn"><i class="fas fa-camera"></i> Upload
                                <input type="file" name="file"/>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 inline-flex">
                        <a href="" class=" btn delete-btn"><i class="fas fa-trash"></i>  Delete</a>
                    </div>  
                </div>
            </div>

            <div class="container-settings">
                <div class="row">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullName" placeholder="James Ensor">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="jamesensor" >
                        </div>

                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" maxlength="200" id="bio" rows="3" name="bio" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor soluta fugit nulla sint in natus inventore debitis exercitationem enim! Sapiente tenetur accusamus doloribus consequatur ut sequi voluptatibus nostrum consectetur deleniti." ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="jamesensor@art.com">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="...." >
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="...." >
                        </div>

                        <div class=" border-bottom"> 
                            <div class="row btn-save-cancel">
                                <div class="col-12">
                                    <a><input  type="submit" value="Save" class="btn  btn-profileEdit"></button></a>
                                    <a href="profile.php"class="btn btn-profileEdit">Cancel</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>   

                <div class="row deactivate">
                    <p>Deactivate your account <a id="deactivate"href=""> Deactivate</a></p>
                    
                </div>
            </div>
        </div>
    </main>
</body>
</html>