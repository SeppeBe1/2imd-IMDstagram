<?php
    namespace src; 
    spl_autoload_register();

    if(isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $search = new classes\Search();
        $results = $search->searchParam($keyword);
        foreach($results as $key) {
            echo $key['username'] . " " . $key['description'] . '<br>'; //nog aan te passen voor resultaten weer te geven
        }
    }

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
                
                <!--<div class="col-5"> 
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-input" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="searchParam">
                    </div>
                </div> -->

                <div class="col-4"> 
                    <form method="POST" action="">
                        <div class="form-inline">
                            <input type="search" class="form-control search-input" name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" required=""/>
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
