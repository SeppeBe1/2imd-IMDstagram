<?php

    // echo "Hello World";
    include_once("../2imd-IMDstagram/header.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">
    <link rel="stylesheet" href="css/style-header.css">

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

    <!-- HIER LOOPEN DOOR VERSCHILLENDE POSTS -->
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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>


            <!-- HIER IS EEN TWEEDE SOORT VERISE VAN EEN POST-->

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">Claude Monet</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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

         <!-- HIER KOMEN VOLGENDE POSTS, ALLEMAAL DEZELFDE -->
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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>
            

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>
            
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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

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

                    </div>

                    <div class="row row-fourth">
                        <div class="col-12">
                            <p><span class="profile-name">James Ensor</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis justo sit amet augue tristique viverra quis sit amet tortor. Nulla justo elit, dictum vitae magna consectetur, ultricies ultricies velit. Pellentesque leo odio, egestas sit amet elementum et, consectetur ut ipsum. #kitchen #home #lovemyplants</p>
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


            </div>

    </main>
    
</body>
</html>