<?php
    namespace src;
    include_once("./header.inc.php");
    spl_autoload_register(); 

    $security = new classes\User();
    $security->onlyLoggedInUsers();


    // LOOP FOR POSTS
    $posts = new classes\Post();
    $resultsPosts = $posts->getAllPosts();
    // FOR DATE TO STRING "**AGO" -> https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago



    // DATE CONVERSION TO ".. AGO"
    $posted_ad = "2021-04-10 08:21:28";

    function convertTime($value){
        list($date, $time) = explode(' ', $value);
        list($year, $month, $day) = explode('-', $date);
        list($hour, $minutes, $seconds) = explode(':', $time);

        // echo $year . "<br>" . $month . "<br>" . $day . "<br>";
        // echo $hour . "<br>" . $minutes . "<br>" . $sec;

        $unit_timestamp = mktime($hour, $minutes, $seconds, $month, $day, $year);
        return $unit_timestamp;

    }

    function convertToAgo($timestamp){
        date_default_timezone_set('Europe/Brussels');

        $differenceTime = time() - $timestamp;
        // Making array to display, days, hours, months etc.
        $periodString = ["sec", "min", "hr", "day", "week", "year", "decade"];
        $periodNumbers = ["60", "60", "24", "7", "4.35", "12", "10"];

        // CURRENT TIME GREATER THAN ALL ABOVE
        for($i = 0; $differenceTime >= $periodNumbers[$i]; $i++){
            $differenceTime /= $periodNumbers[$i];
            $differenceTime = round($differenceTime);

            // TO MAKE IT TO SECS, MINS, HRS, ETC.
            if($differenceTime != 1) $periodString[$i].="s";

            $output = "$differenceTime $periodString[$i]";

            return "Posted ". $output. " ago";
        }

    }

     $unixTimestamp = convertTime($posted_ad);
     echo convertToAgo($unixTimestamp);


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
                        <a href="profile.php?id=<?php echo $post["id"]; ?>">
                            <img src="<?php echo $post['avatar']?>" class="profile-pic-feed">
                        </a>
                    </div>
                    <div class="col-7">
                        <a href="profile.php?id=<?php echo $post["id"]; ?>"><span class="profile-name"><?php echo $post['username']?></span></a><br>
                        <a href="#" class="profile-location"><?php echo $post['location']?></a>
                    </div>
                    <div class="col-1">
                        <a href="#" class="unfollow-button">Unfollow</a>
                    </div>
                </div>

                <div class="row row-second">
                    <div class="col-12">
                        <img src="<?php echo  $post['photo'];?>" class="picture-feed">
                    </div>
                </div>

                <div class="row row-third">
                    <div class="col-1">
                        <a href="#"><img src="./img/icons/heart-outlines.svg" class="icon-feed"></a>
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
                        <p><span class="profile-name"><?php echo $post['username'];?></span>
                            <!--DESCRIPTION + HASHTAGS -->
                            <?php $descrArray = explode(" ", $post['description']);?>
                            <?php foreach($descrArray as $word): ?>
                                <?php if($word[0] == "#"): ?>
                                    <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo  $word;?></a>
                                <?php else: ?>
                                    <?php echo  $word; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>
                    </div>
                </div>

                <div class="row row-sixth">
                    <div class="col-12">
                        <p class="timing-feed"><?php echo $post['postedDate']?></p>
                    </div>
                </div>

                    <form action="feed.php">
                    <div class="row row-seventh">
                        <div class="col-10">
                            
                                <!-- <input type="text" id="comment-input" name="comment-input" placeholder="Place a comment" size='35'> -->
                                <textarea rows="auto" cols="45" class="comment-input" id="comment-input"  name="comment-input" placeholder="Place a comment"></textarea>
                        </div>
                        <div class="col-2">
                                <a href="#" class="comment-button">Place</a>
                        </div>
                        </div>
                    </form>
                

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