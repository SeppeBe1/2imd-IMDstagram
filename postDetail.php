<?php

    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");


    if(!empty($_GET["id"])){
        // WE COLLECT HERE THE INFORMATION FOR THE SPECIFIC POST, WITH THE ID
        $post_id = $_GET["id"];
        $getPost = new classes\Post();
        $postsD = $getPost->getPostDetail($post_id);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="css/style-feed.css">

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>

    <title>Plantstagram</title>
</head>
<body>

    <?php foreach($postsD as $post): ?>
      
        <div class="container post-post">
                    <div class="row row-first">
                        <div class="col-2">
                            <a href="#">
                                <img src="<?php echo $post["avatar"]?>" class="profile-pic-feed">
                            </a>
                        </div>
                        <div class="col-7">
                            <a href="profile.php?id=<?php echo $post["id"]; ?>"><span class="profile-name"><?php echo $post["username"]?></span></a><br>
                            <a href="#" class="profile-location"><?php echo $post["location"]?></a>
                        </div>
                        <div class="col-1">
                            <a href="#" class="follow-button">Follow</a>
                        </div>
                    </div>

                    <div class="row row-second">
                        <div class="col-12">
                            <img src="<?php echo $post["photo"]?>" class="picture-feed">
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
                            <p><span class="profile-name"><?php echo $post["username"]?></span> 
                            <?php $descrArray = explode(" ", $post['description']);?>
                            <?php foreach($descrArray as $word): ?>
                                <?php if($word[0] == "#"): ?>
                                    <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo  $word;?></a>
                                <?php else: ?>
                                    <?php echo  $word; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </p>

                            <?php endforeach; ?>
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
                            <p class="timing-feed"><?php echo $post["postedDate"]?></p>
                        </div>
                    </div>

            </div>
                            
    
</body>
</html>