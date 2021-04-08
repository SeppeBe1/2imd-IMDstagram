<?php
    namespace src;
    include_once("./header.inc.php");
    spl_autoload_register(); 

    $security = new classes\User();
    $security->onlyLoggedInUsers();

    /* if(isset($_POST['paramSearch'])){
        echo $search = $_POST['paramSearch'] . " check";
    } */

    // TEST SEARCH FUNCTION HERE and delete search.php

    $posts = new classes\Post();
    $resultsPosts = $posts->getAllPosts();

    // var_dump($resultsPosts);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>
    <title>Plantstagram - feed</title>
</head>
<body>

    <!-- <header>
        <div class="container-fluid feed-header">
            <div class="row justify-content-center">
                <img src="img/plantstagram-logo.png" class="plant-logo justify-content-center">
            </div>
        </div>

        <div class="container-fluid navigation sticky-top">
            <div class="row">
                <div class="col-7">
                    <a href="profile.php">
                        <img src="./img/profile-pic.png" class="profile-pic">
                    </a>
                    <a href="feed.php">
                        <img src="./img/icons/home.svg" class="icon-nav">
                    </a>
                    <a href="#">
                        <img src="./img/icons/+.svg" class="icon-nav">
                    </a>
                </div>
                <div class="col-5">
                    
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-input" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                    </div>
                </div>
                
            </div>
        </div>

    </header> -->
    

    <main>

    <!-- START VAN LOOP-->

    <?php foreach($resultsPosts as $post): ?>

    <div class="container post-post">
                <div class="row row-first">
                    <div class="col-2">
                        <a href="#">
                            <img src="<?php echo $post['avatar']?>" class="profile-pic-feed">
                        </a>
                    </div>
                    <div class="col-7">
                        <a href="#"><span class="profile-name"><?php echo $post['username']?></span></a><br>
                        <a href="#" class="profile-location"><?php echo $post['location']?></a>
                    </div>
                    <div class="col-1">
                        <a href="#" class="unfollow-button">Unfollow</a>
                    </div>
                </div>

                <div class="row row-second">
                    <div class="col-12">
                        <img src="<?php echo $post['photo'] ?>" class="picture-feed">
                    </div>
                    
                </div>

                <div class="row row-third">
                    <div class="col-1">
                        <a href="#"><img src="./img/icons/heart.svg" class="icon-feed"></a>
                    </div>
                    <div class="col-1">
                        <p class="number-feed">91</p>
                    </div>
                    <div class="col-1">
                        <a href="#"><img src="./img/icons/chat.svg" class="icon-feed"></a>
                    </div>
                    <div class="col-1">
                        <p class="number-feed">1</p>
                    </div>

                    <div class="col-6">

                    </div>

                    <div class="col-1">
                        <a href="#"><img src="./img/icons/flag.svg" class="icon-feed"></a>
                    </div>

                </div>

                <div class="row row-fourth">
                    <div class="col-12">
                        <p><span class="profile-name"><?php echo $post['username']?> </span>
                            <?php echo $post['description']?>

                            <a href="#" class="tags-post">#kitchen </a>
                            <a href="#" class="tags-post">#home</a>
                            <a href="#" class="tags-post">#lovemyplants</a>
                        </p>
                        
                    </div>
                </div>

                <div class="row row-fifth">
                    <div class="col-12">
                        <p class="reaction"><span class="profile-name">Paul Delvaux </span>Proin ullamcorper feugiat eros, sit amet accumsan tellus cursus vitae. Etiam feugiat tristique ante, luctus feugiat risus ultrices ut!</p>
                    </div>  
                </div>

                <div class="row row-sixth">
                    <div class="col-12">
                        <p class="timing-feed"><?php echo $post['postedDate']?></p>
                    </div>
                </div>

                <div class="row row-seventh">
                    <div class="col-10">
                        <form action="feed.php">
                            <input type="text" id="comment-input" name="comment-input" placeholder="Place a comment" size='35'>
                        </form>
                    </div>
                    <div class="col-2">
                            <a href="#" class="comment-button">Place</a>
                    </div>

                </div>

        </div>
    <?php endforeach; ?>



    <div class="row d-flex justify-content-center">
        <a href="#" class="load-more">Load more...</a>
    </div>
    

    <!-- HIER LOOPEN DOOR VERSCHILLENDE POSTS -->
    <!-- DIT ZIJN POSTS TER ILLSTRATIE VAN HOE ZE ERUIT MOETEN ZIEN-->
            <div class="container post-post">
                    <div class="row row-first">
                        <div class="col-2">
                            <a href="#">
                                <img src="./img/image-12.png" class="profile-pic-feed">
                            </a>
                        </div>
                        <div class="col-7">
                            <a href="#"><span class="profile-name">James Ensor</span></a><br>
                            <a href="#" class="profile-location">Cacun, Mexico</a>
                        </div>
                        <div class="col-1">
                            <a href="#" class="unfollow-button">Unfollow</a>
                        </div>
                    </div>

                    <div class="row row-second">
                        <div class="col-12">
                            <img src="./img/unsplash1.jpg" class="picture-feed">
                        </div>
                        
                    </div>

                    <div class="row row-third">
                        <div class="col-1">
                            <a href="#"><img src="./img/icons/heart.svg" class="icon-feed"></a>
                        </div>
                        <div class="col-1">
                            <p class="number-feed">91</p>
                        </div>
                        <div class="col-1">
                            <a href="#"><img src="./img/icons/chat.svg" class="icon-feed"></a>
                        </div>
                        <div class="col-1">
                            <p class="number-feed">1</p>
                        </div>

                        <div class="col-6">

                        </div>

                        <div class="col-1">
                            <a href="#"><img src="./img/icons/flag.svg" class="icon-feed"></a>
                        </div>

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. 
                                <a href="#">#kitchen </a>
                                <a href="#">#home</a>
                                <a href="#">#lovemyplants</a>
                            </p>
                            
                        </div>
                    </div>

                    <div class="row row-fifth">
                        <div class="col-12">
                            <p class="reaction"><span class="profile-name">Paul Delvaux </span>Proin ullamcorper feugiat eros, sit amet accumsan tellus cursus vitae. Etiam feugiat tristique ante, luctus feugiat risus ultrices ut!</p>
                        </div>  
                    </div>

                    <div class="row row-sixth">
                        <div class="col-12">
                            <p class="timing-feed">14 minutes ago</p>
                        </div>
                    </div>

                    <div class="row row-seventh">
                        <div class="col-10">
                            <form action="feed.php">
                                <input type="text" id="comment-input" name="comment-input" placeholder="Place a comment" size='35'>
                            </form>
                        </div>
                        <div class="col-2">
                                <a href="#" class="comment-button">Place</a>
                        </div>

                    </div>

            </div>


            <!-- HIER IS EEN TWEEDE SOORT VERSIE VAN EEN POST-->

            <div class="container post-post">
                    <div class="row row-first">
                        <div class="col-2">
                            <a href="#">
                                <img src="./img/image-7.png" class="profile-pic-feed">
                            </a>
                        </div>
                        <div class="col-7">
                            <a href="#"><span class="profile-name">Claude Monet</span></a><br>
                            <a href="#" class="profile-location">Lyon, France</a>
                        </div>
                        <div class="col-1">
                            <a href="#" class="follow-button">Follow</a>
                        </div>
                    </div>

                    <div class="row row-second">
                        <div class="col-12">
                            <img src="./img/unsplash3.jpg" class="picture-feed">
                        </div>
                        
                    </div>

                    <div class="row row-third">
                        <div class="col-1">
                            <a href="#"><img src="./img/icons/heart-outlines.svg" class="icon-feed"></a>
                        </div>
                        <div class="col-1">
                            <p class="number-feed">13</p>
                        </div>
                        <div class="col-1">
                            <a href="#"><img src="./img/icons/chat.svg" class="icon-feed"></a>
                        </div>
                        <div class="col-1">
                            <p class="number-feed">1</p>
                        </div>

                        <div class="col-6">

                        </div>

                        <div class="col-1">
                            <a href="#"><img src="./img/icons/flag.svg" class="icon-feed"></a>
                        </div>

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">Claude Monet</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum.
                                <a href="#">#kitchen </a>
                                <a href="#">#home</a>
                                <a href="#">#lovemyplants</a>
                            </p>

                        </div>
                    </div>

                    <div class="row row-fifth">
                        <div class="col-12">
                            <p class="reaction"><span class="profile-name">Eduard Manet </span>Proin ullamcorper feugiat eros, sit amet accumsan tellus cursus vitae. Etiam feugiat tristique ante, luctus feugiat risus ultrices ut!</p>
                        </div>  
                    </div>

                    <div class="row row-sixth">
                        <div class="col-12">
                            <p class="timing-feed">14 minutes ago</p>
                        </div>
                    </div>

            </div>


    </main>
    
</body>
</html>