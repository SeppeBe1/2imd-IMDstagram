<?php 

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

    <title>Edit profile</title>
</head>
<body>
<header>
        <div class="container-fluid feed-header">
            <div class="row ">
                <div class="col-sm-12  text-center ">
                    <img src="img/plantstagram-logo.png" class="plant-logo ">
                </div>
            </div>
        </div>

        <div class="navigation ">
            <div class="row ">
                <div class="col-7 col-lg-6 ">
                    <div class="menu-links">
                        <a href="profile.php">
                            <img src="https://images.pexels.com/photos/3101767/pexels-photo-3101767.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="profile-pic">
                        </a>
                        <a href="feed.php">
                            <img src="./img/icons/home.svg" class="icon-nav">
                        </a>
                        <a href="#">
                            <img src="./img/icons/+.svg" class="icon-nav">
                        </a>
                    </div>
                </div>

                <div class="col-5 col-lg-3 ">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-input" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>