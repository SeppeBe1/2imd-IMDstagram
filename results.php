<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $likes = new classes\Like();

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
        <!-- PRINT RESULTATEN AF VAN DE OPGEVRAAGDE PARAMETER -->
            <?php if(isset($_POST['keyword'])) : ?>
                <?php 
                    $search = new classes\Search();
                    $search->setParam($_POST['keyword']);
                    $keyword = $search->getParam();
                    $resultsSearch = $search->searchParam($keyword);
                ?>
            
                    <div class="container search-results-con">
                        <h3>Search results for <span class="bold">"<?php echo $_POST['keyword'] ?>"</span>:</h3><br>

                        <?php foreach($resultsSearch as $key): ?>
                            <?php
                                $likes->setPostID($key['id']);
                                $post_id = $likes->getPostID();
                            ?>

                            <div class="container post-post">
                                    <div class="row row-first">
                                        <div class="col-2">
                                            <a href="#">
                                                <img src="./user_avatar/<?php echo $key['avatar']; ?>" class="profile-pic-feed">
                                            </a>
                                        </div>
                                        <div class="col-7">
                                            <a href="profile.php?id=<?php echo $key["userid"]; ?>"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                            <a href="results.php?location=<?php echo $key['location']; ?>" class="profile-location"><?php echo $key['location']; ?></a>
                                            <br>
                                            <a href="postDetail.php?id=<?php echo $key["id"]; ?>">
                                            <?php $folder = "uploads/";
                                            $file = "";
                                            if (is_dir($folder)) {
                                                    if ($open = opendir($folder)) {
                                                        if ($file == "." || $key['photo'] == "..") continue;
                                                        $file =  classes\Post::getPhoto($post_id);
                                                        ?>
                                                        <img src= <?php echo '"uploads/' . $file . '"'; ?> class="picture-feed">
                                                        <?php closedir($open);
                                                    }
                                                } ?>
                                            </a><br><!--a href aanpassen param meegeven naar de detailpg van de foto-->
                                            <br>

                                            <?php $descrArray = explode(" ", $key['description']);?>
                                            <?php foreach($descrArray as $word): ?>
                                            <?php if (!empty($word)) : ?>
                                                <?php if($word[0] == "#"): ?>
                                                    <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo  $word;?></a>
                                                <?php else: ?>
                                                    <?php echo  $word; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>

    <!-- RESULTATEN TAGS -->
            <?php if(isset($_GET['tag'])):?>
                <?php 
                    $searchTag = new classes\Search();
                    $searchTag->setTag($_GET['tag']);
                    $hashtag = $searchTag->getTag();
                    $resultsTags = $searchTag->searchTags($hashtag);?>

                            <div class="container-fluid container-gallery tags-results">
                                <div class="row">
                                    <div>
                                        <h3 class="results-title">Posts from <span class="tag-results"><?php echo "#" . $_GET['tag']; ?></span></h3>
                                    </div> 
                                    
                                <?php foreach($resultsTags as $tagResults):?>
                                <?php
                                    $likes->setPostID($tagResults['id']);
                                    $post_id = $likes->getPostID();
                                ?>
                                    <div class="col-4">
                                        <div class="square-image">
                                            <a href="postDetail.php?id=<?php echo $tagResults["id"]; ?>">
                                            <?php $folder = "uploads/";
                                            $file = "";
                                            if (is_dir($folder)) {
                                                    if ($open = opendir($folder)) {
                                                        if ($file == "." || $tagResults['photo'] == "..") continue;
                                                        $file =  classes\Post::getPhoto($post_id);
                                                        ?>
                                                        <img src= <?php echo '"uploads/' . $file . '"'; ?> class="picture-feed">
                                                        <?php closedir($open);
                                                    }
                                                } ?>
                                            </a>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
            <?php endif; ?>

            <!-- RESULTATEN LOCATION -->
            <?php if(isset($_GET['location'])) : ?>
                <?php 
                    $search = new classes\Search();
                    $search->setParam($_GET['location']);
                    $keyword = $search->getParam();
                    $resultsSearch = $search->searchParam($keyword);
                ?>
            
                    <div class="container search-results-con">
                        <h3>Search results for <span class="bold">"<?php echo $_GET['location']; ?>"</span>:</h3><br>

                        <?php foreach($resultsSearch as $key): ?>
                            <?php
                                $likes->setPostID($key['id']);
                                $post_id = $likes->getPostID();
                            ?>

                            <div class="container post-post">
                                    <div class="row row-first">
                                        <div class="col-2">
                                            <a href="#">
                                                <img src="./user_avatar/<?php echo $key['avatar'] ?>" class="profile-pic-feed">
                                            </a>
                                        </div>
                                        <div class="col-7">
                                            <a href="profile.php?id=<?php echo $key["userid"]; ?>"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                            <a href="results.php?location=<?php echo $key['location']; ?>" class="profile-location"><?php echo $key['location']; ?></a>
                                            <br>
                                            <a href="postDetail.php?id=<?php echo $key["id"]; ?>">
                                            <?php $folder = "uploads/";
                                            $file = "";
                                            if (is_dir($folder)) {
                                                    if ($open = opendir($folder)) {
                                                        if ($file == "." || $key['photo'] == "..") continue;
                                                        $file =  classes\Post::getPhoto($post_id);
                                                        ?>
                                                        <img src= <?php echo '"uploads/' . $file . '"'; ?> class="picture-feed">
                                                        <?php closedir($open);
                                                    }
                                                } ?>
                                            </a><br><!--a href aanpassen param meegeven naar de detailpg van de foto-->
                                            <br>

                                            <?php $descrArray = explode(" ", $key['description']);?>
                                            <?php foreach($descrArray as $word): ?>
                                            <?php if (!empty($word)) : ?>
                                                <?php if($word[0] == "#"): ?>
                                                    <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo  $word;?></a>
                                                <?php else: ?>
                                                    <?php echo  $word; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; ?>

                                        </div>
                                    </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            <?php endif; ?>
        </main>
    </body>
</html>

