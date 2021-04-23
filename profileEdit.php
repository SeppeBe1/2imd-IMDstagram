<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $security = new classes\User();

    /* GETTERS SETTERS TOEVOEGEN! */
    if(isset($_SESSION['user']) ){
        try {
            $user = new classes\User();
            $username = $_SESSION['user'];
            $user->setUsername($username);
            $usersinfo = $user->showUser($username);
            var_dump($usersinfo);
        } catch (\Throwable $th) {
            //throw $th; ERROR MSSG? 
        }
        
    } 

// UPDATE INFO 
    if (!empty($_POST['save'])){
        $username = $_SESSION['user'];

    
        if(!empty($_POST['fullName'])){
            $fullName = $_POST['fullName'];
            
    
            try{
                {
                    $user = new classes\User();
                    $user->changefullName($fullName, $username);
                        
                } 
                
            }catch(\Throwable $error) {
                $error = $error->getMessage();
            }
        }

        if(!empty($_POST['username'])){
            // $oldusername = $_SESSION['user'];

            try{

                    $user = new classes\User();
                    $newUsername =$_POST['username'];
                    $user->setUsername($newUsername);
                    $getNewUsername = $user->getUsername();
                    
                    if ($user->usernameExists($username) == true){
                        $user->changeUsername($getNewUsername, $username);

                        $_SESSION['user'] = $_POST['username'];
                        
                        
                        

                    }elseif($user->usernameExists($username) == false){
                        $errorUsernameExists = true;
                        

                    }

                }catch(\Throwable $error) {
                $error = $error->getMessage();
            }
        }
    
        if(!empty($_POST['bio'])){
            $bio = $_POST['bio'];
            $username = $_SESSION['user'];
            try{
                {
                    $user = new classes\User();
                    $user->changeBio($bio, $username);       
                } 
                
            }catch(\Throwable $error) {
                $error = $error->getMessage();
            }
        }
    
        if(!empty($_POST['email'])){
            $email = $_POST['email'];
            $username = $_SESSION['user'];
    
            try{
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $user = new classes\User();
                    $user->changeEmail($email, $username);
                        
                } else{
                    echo "geen bestaande email";
                }
            }catch(\Throwable $error) {
                $error = $error->getMessage();
            }
        }

        if(!empty($_POST['password']) && !empty($_POST['confirmPassword'])){
            $lengthPassword = strlen($_POST['password']);
            $password = $_POST['password'];
            try {
                    // if password equals the second input password = set password
                    if($_POST['password'] === $_POST['confirmPassword']) {
                        if($lengthPassword >= 6) {
                            $user->setPassword($_POST['password']);
                            $user->setConfirmPassword($_POST['confirmPassword']);
                            $user->changePassword($password,$username); 
                            
                        }else{
                            $errorLengthPw = true;

                        }      
                    }else{
                        $errorPassword = true;
                       
                    }
            
                } catch (\Throwable $error) {
                    $error = $error->getMessage();
                }
            }  
            
        //AVATAR
        if(isset($_FILES["avatar"])){
            
            $file = $_FILES["avatar"];
            print_r($file);
            $fileName = $_FILES["avatar"]["name"];
            $fileTmpName = $_FILES["avatar"]["tmp_name"];
            $fileSize = $_FILES["avatar"]["size"];
            $fileError = $_FILES["avatar"]["error"];
            $fileType = $_FILES["avatar"]["type"];

            $fileExt = explode(".", $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array("jpg","jpeg","png");
            
            if(in_array($fileActualExt,$allowed)){
                if($fileError === 0){
                    if ($fileSize < 2000000){
                        $avatar = uniqid('',true).".".$fileActualExt;
                        
                        $fileDestination = "user_avatar/".$avatar;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        echo 'it works!';
                        $user = new classes\User();
                        $user->changeAvatar($avatar, $username);
                        header ("Refresh:0");
                    }else{
                        
                        echo "your file is to big";
                    }
                }else {
                    echo "error uploading your files";
                }
            }else{
                echo "you cannot upload files of this type";
            }
        }

        header("Refresh:0");
    }

    if (isset($_POST['deleteAvatar'])){
        $user = new classes\User();
        
        $user->deleteAvatar($username);
        $avatar = "./img/placeholder.jpeg";
        echo "gelukt";
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
           
            <?php foreach($usersinfo as $user): ?>

            <div class="container-fluid ">
                
                <div class="row ">
                    <div class="col-12 col-md-3 text-center ">
                    <?php if (!isset($user['avatar'])): ?>
                        <div class="avatar ">
                            <img src="./img/placeholder.jpeg" class="profile-pic-profile ">
                       </div>
                      
                    <?php else: ?>
                        <div class="avatar ">
                            <img src="<?php echo $user['avatar']?>" class="profile-pic-profile ">
                       </div>
                    <?php endif; ?>
                          
                    </div>
                </div>


                
                <div class="row container-profilePic">
                    <div class="col-6 col-md-3">
                    
                        <div class="file btn upload-btn"><i class="fas fa-camera"></i> Upload
                                <input type="file" id="preview-image" name="avatar" accept=".png, .jpg, .jpeg"/>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 inline-flex">
                        <a href="" class=" btn delete-btn"><i class="fas fa-trash"></i>  Delete</a>
                    </div>  
                </div>
            </div>

            <div class="container-settings">
                <div class="row">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullName" placeholder="<?php echo $user['fullName'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $user["username"]?>" >
                        </div>

                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea class="form-control" maxlength="200" id="bio" rows="3" name="bio" placeholder="<?php echo $user['bio'] ?>"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $user['email'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="● ● ● ● ●" >
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="● ● ● ● ●" >
                        </div>

                        <div class=" border-bottom"> 
                            <div class="row btn-save-cancel">
                                <div class="col-12">
                                    <a><input  type="submit" name ="save" value="Save" class="btn  btn-profileEdit"></button></a>
                                    <a href="profile.php"class="btn btn-profileEdit">Cancel</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>   
                <?php endforeach; ?>
                <div class="row deactivate">
                    <p>Deactivate your account <a id="deactivate"href=""> Deactivate</a></p>
                    
                </div>
            </div>
        </div>
    </main>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src="script.js"></script>
</body>
</html>