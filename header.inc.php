<?php

    namespace src;
    spl_autoload_register();

    $security = new classes\User();
    $security->onlyLoggedInUsers();
    // $usernameCurrent = $security->checkLoggedInUsername();

    // var_dump($usernameCurrent);




    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-header.css">
    <link rel="shortcut icon" type="image/png" href="./img/__favi-plant.png">
    <title>Plantstagram </title>
</head>
<body>

    <header>
        <div class="container-fluid header-logo">
            <div class="row">
                <div class="col-12 text-center header-logo">
                    <img src="img/plantstagram-logo.png" class="plant-logo ">
                </div>
            </div>
        </div>

        <div class="container-fluid navigation sticky-top">
            <div class="row">
                <div class="col-6 ">
                    <a href="profile.php?username=<?php echo $security->checkLoggedInUsername(); ?>">
                        <img src="https://images.pexels.com/photos/3101767/pexels-photo-3101767.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="profile-pic">
                    </a>
                    <a href="feed.php">
                        <img src="./img/icons/home.svg" class="icon-nav">
                    </a>
                    <a href="addPost.php">
                        <img src="./img/icons/+.svg" class="icon-nav">
                    </a>
                </div>
                
                <!--<div class="col-5"> 
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-input" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="searchParam">
                    </div>
                </div> -->

                <div class="col-5"> 
                    <form method="POST" action="results.php">
                        <div class="form-inline">
                            <input type="search" id ="search-input"class="form-control " name="keyword" value="<?php echo isset($_POST['keyword']) ? htmlspecialchars($_POST['keyword']) : '' ?>" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" required=""/>
                            <!-- <button class="btn btn-success" name="search">Search</button> -->
                        </div>
                    </form>
                </div>

                <div class="col-1 logout-button">
                    <div>
                    <a href="logout.php">
                        <img src="./img/icons/logout.svg" class="icon-nav icon-logout">
                    </a>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    <!-- <script src="scripts/keyEnter.js"></script> -->
</body>
</html>
