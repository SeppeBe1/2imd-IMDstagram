<?php
    spl_autoload_register();
    // echo "Test - this is the header";

    /* function searchParam($param) {
        if(isset($_POST['searchParam'])) {
            echo $_POST['searchParam'];
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
    <link rel="stylesheet" href="css/style-header.css">
    <title>Header</title>
</head>
<body>

    <header>
        <div class="container-fluid header-logo">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="img/plantstagram-logo.png" class="plant-logo ">
                </div>
            </div>
        </div>

        <div class="container-fluid navigation sticky-top">
            <div class="row">
                <div class="col-6 ">
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

                <div class="col-5"> <!-- ER MOET HIER EEN VORM VAN SUBMIT KOMEN, ZODAT IK EEN POST KAN VERSTUREN FORM? -->
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-input" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="searchParam">
                        <!-- <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button> -->
                    </div>
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
    
</body>
</html>
