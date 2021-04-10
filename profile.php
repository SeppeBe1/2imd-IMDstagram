<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $security = new classes\User();
    $security->onlyLoggedInUsers();
    

    // $users = new classes\User();
    // $users->getUsernameFrom();
    // var_dump($users);

    // $user_id = $_GET["id"];
    // var_dump($user_id);

    if(!empty($_GET["id"])){
        $user_id = $_GET["id"];
        // var_dump($user_id);
        $getUser = new classes\User();
        $users = $getUser->getUsernameFrom($user_id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-feed.css"> 
    <link rel="stylesheet" href="css/style-profile.css"> 

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>

    <title>Profile</title>
    
</head>

<body>


    <main>
    <?php foreach($users as $user): ?>
        <div class="container container-profile clearfix">
            <!-- EDIT BTN WEG WANNEER IK KIJK NAAR ANDER PROFIEL -->
            <div class="row flex-row-reverse">
                <div class="col-5 col-lg-4">
                    <a href="profileEdit.php" class="btn edit-btn">Edit profile</a>
                </div>
            </div>


            <div class="row row-first">
                <div class="col-3">
                    <a href="#">
                        <img src="<?php echo $user["avatar"]?>" class="profile-pic-profile">
                    </a>
                </div>

                <div class="col-9 profile-about">
                    <p><span class="profile-name"><?php echo $user["username"]?></span></p><br>
                    <p class="bio"><?php echo $user["bio"]?></p>
                </div>
            </div>
            

            <div class="container-follow ">
                <div class="row ">
                    
                    <div class="col-4  text-center follow">
                        <h7 class="number-profile mb-0 d-block">10</h7><small class="text-muted">
                            Posts</small>
                    </div>

                    <div class="col-4  text-center follow">
                        <h7 class="number-profile mb-0 d-block">182</h7><small class="text-muted">Followers</small>
                    </div>

                    <div class="col-4  text-center follow">
                        <h7 class="number-profile mb-0 d-block">320</h7><small class="text-muted">Following</small>
                    </div>
                </div>
                
                <div class="row ">
                    <div class="col-sm-12  text-center follow">
                        <!-- FOLLOW BTN WEG WANNEER IK KIJK NAAR EIGEN PROFIEL -->
                        <a href="#" class="float-left btn btn-follow ">Follow</a>
                    </div>
                </div>
            </div>     
        </div>
        <?php endforeach ;?>

        <!-- LOOPEN OVER POSTS !-->

        <div class="container-fluid container-gallery">
            <div class="row">
                <div class="col-4">
                    <img class="img-thumbnail"src="https://images.pexels.com/photos/583791/pexels-photo-583791.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" >
                </div>

                <div class="col-4 ">
                    <img class="img-thumbnail" src="https://images.pexels.com/photos/3673763/pexels-photo-3673763.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" class="img-responsive">
                </div>

                <div class="col-4 ">
                    <img class="img-thumbnail" src="https://images.pexels.com/photos/4019666/pexels-photo-4019666.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260" class="img-responsive">
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <img class="img-thumbnail "src="https://images.pexels.com/photos/3255246/pexels-photo-3255246.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" >
                </div>

                <div class="col-4 ">
                    <img class="img-thumbnail" src="https://images.pexels.com/photos/3817847/pexels-photo-3817847.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-responsive">
                </div>

                <div class="col-4 ">
                    <img class="img-thumbnail" src="https://images.pexels.com/photos/355279/pexels-photo-355279.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-responsive">
                </div>
            </div>

            <div class="row">
                <div class="col-4 square">
                    <img class="img-thumbnail"src="https://images.pexels.com/photos/771319/pexels-photo-771319.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" >
                </div>

                <div class="col-4 ">
                    <img class="img-thumbnail" src="https://images.pexels.com/photos/4894423/pexels-photo-4894423.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-responsive">
                </div>

                <div class="col-4 ">
                    <img class="img-thumbnail" src="https://images.pexels.com/photos/5720091/pexels-photo-5720091.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" class="img-responsive">
                </div>
            </div>
            

    </main>

</body>
</html>