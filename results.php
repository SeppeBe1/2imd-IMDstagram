<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $security = new classes\User();
    $security->onlyLoggedInUsers();

   /* if(isset($_POST['keyword'])) { IS OK TO PUT IN HTML?
        $keyword = $_POST['keyword'];
        $search = new classes\Search();
        $resultsSearch = $search->searchParam($keyword);
    } */

    if(isset($_GET['tag'])) {
        $hashtag = $_GET['tag'];
        $searchTag = new classes\Search();
        $resultsTags = $searchTag->searchTags($hashtag);
        var_dump($resultsTags);
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">
    <link rel="stylesheet" href="css/style-results.css">


    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>
    <title>Plantstagram - feed</title>
</head>
<body>

        <main>
        <!-- HIER RESULTS PRINTEN - NEEDS TWEAKING WITH HTML/CSS -->
        <?php if(isset($_POST['keyword'])): ?>
            <?php $keyword = $_POST['keyword'];
                $search = new classes\Search();
                $resultsSearch = $search->searchParam($keyword); ?>
        
                <div class="container search-results-con">
                    <h3>Search results for <span class="bold">"<?php echo $_POST['keyword'] ?>" </span>:</h3>

                    <p class="search-results-p">Accounts</p>
                    <p class="search-results-p">Posts</p>
                    <p class="search-results-p">Tags</p>
                    <p class="search-results-p">Locations</p>


                    <?php foreach($resultsSearch as $key): ?>
                        <div class="container post-post">
                                <div class="row row-first">
                                    <div class="col-2">
                                        <a href="#">
                                            <img src="<?php echo $key['avatar']; ?>" class="profile-pic-feed">
                                        </a>
                                    </div>
                                    <div class="col-7">
                                        <a href="#"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                        <a href="#" class="profile-location"><?php echo $key['location']; ?></a>
                                        <br>
                                        <p class="profile-description"><?php echo $key['description']; ?></p>
                                        <img src="<?php echo  $key['photo'];?>" class="picture-feed">
                                        
                                    </div>
                                </div>
                        </div>
                    <?php endforeach; ?>

                </div>

        <?php endif; ?>
                

                <!-- RESULTS TAGS -->

                <!-- <div class="container-fluid tags-results">
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
                </div> -->
        </main>
    </body>
</html>

