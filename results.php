<?php

namespace src;

spl_autoload_register();
include_once("./header.inc.php");

$like = new classes\Like();
$posts = new classes\Post();

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
    <link rel="stylesheet" href="css/style-results.css">


    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>
    <title>Plantstagram - feed</title>
</head>

<body>

    <main>
        <!-- PRINT RESULTATEN AF VAN DE OPGEVRAAGDE PARAMETER -->
        <?php if (isset($_POST['keyword'])) : ?>
            <?php
            $search = new classes\Search();
            $search->setParam($_POST['keyword']);
            $resultsSearch = $search->searchParam();
            ?>
            <div class="container search-results-con">
                <h3>Search results for <span class="bold">"<?php echo htmlspecialchars($_POST['keyword']) ?>"</span>:</h3>
                <br>

                <?php foreach ($resultsSearch as $key) : ?>
                    <div class="container post-post">
                        <div class="row row-first">
                            <div class="col-2">
                                <a href="#">
                                    <img src="./user_avatar/<?php echo $key['avatar']; ?>" class="profile-pic-feed">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="profile.php?username=<?php echo $key["username"]; ?>"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                <a href="results.php?location=<?php echo $key['location']; ?>" class="profile-location"><?php echo $key['location']; ?></a>
                                <br>
                                <a href="postDetail.php?id=<?php echo $key["id"]; ?>">
                                    <?php
                                    $folder = "uploads/";
                                    $file = "";
                                    if (is_dir($folder)) {
                                        if ($open = opendir($folder)) {
                                            if ($file == "." || $key['photo'] == "..") continue;
                                            $file =  classes\Post::getPhoto($key['id']); ?>
                                            <img src=<?php echo '"uploads/' . $file . '"'; ?> class=<?php echo '" picture-feed ' . $posts->getSelectedFilter($key["filter_id"]) . '"'; ?>>
                                    <?php closedir($open);
                                        }
                                    } ?>
                                </a><br>
                                <br>

                                <?php $descrArray = explode(" ", $key['description']); ?>
                                <?php foreach ($descrArray as $word) : ?>
                                    <?php if (!empty($word)) : ?>
                                        <?php if ($word[0] == "#") : ?>
                                            <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo htmlspecialchars($word); ?></a>
                                        <?php else : ?>
                                            <?php echo htmlspecialchars($word); ?>
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
        <?php if (isset($_GET['tag'])) : ?>
            <?php
            $searchTag = new classes\Search();
            $searchTag->setTag($_GET['tag']);
            $resultsTags = $searchTag->searchTags();
            ?>

            <div class="container-fluid container-gallery tags-results">
                <div class="row">
                    <div>
                        <h3 class="results-title">Tag results for <span class="tag-results"><?php echo "#" . htmlspecialchars($_GET['tag']); ?></span></h3>
                    </div>

                    <?php foreach ($resultsTags as $tagResults) : ?>
                        <div class="col-4">
                            <div class="square-image">
                                <a href="postDetail.php?id=<?php echo $tagResults["id"]; ?>">
                                    <?php
                                    $folder = "uploads/";
                                    $file = "";
                                    if (is_dir($folder)) {
                                        if ($open = opendir($folder)) {
                                            if ($file == "." || $tagResults['photo'] == "..") continue;
                                            $file =  classes\Post::getPhoto($tagResults['id']);
                                    ?>
                                            <img src=<?php echo '"uploads/' . $file . '"'; ?> class="tags-result-img">
                                    <?php closedir($open);
                                        }
                                    }
                                    ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- RESULTATEN LOCATION -->
        <?php if (isset($_GET['location'])) : ?>
            <?php
            $search = new classes\Search();
            $search->setParam($_GET['location']);
            $resultsSearch = $search->searchParam();
            ?>

            <div class="container search-results-con">
                <h3>Search results for <span class="bold">"<?php echo htmlspecialchars($_GET['location']); ?>"</span>:</h3><br>

                <?php foreach ($resultsSearch as $key) : ?>
                    <?php
                    $like->setPostID($key['id']);
                    $post_id = $like->getPostID();
                    ?>

                    <div class="container post-post">
                        <div class="row row-first">
                            <div class="col-2">
                                <a href="#">
                                    <img src="./user_avatar/<?php echo $key['avatar'] ?>" class="profile-pic-feed">
                                </a>
                            </div>
                            <div class="col-7">
                                <a href="profile.php?username=<?php echo $key["username"]; ?>"><span class="profile-name"><?php echo $key['username']; ?></span></a><br>
                                <a href="results.php?location=<?php echo $key['location']; ?>" class="profile-location"><?php echo $key['location']; ?></a>
                                <br>
                                <a href="postDetail.php?id=<?php echo $key["id"]; ?>">
                                    <?php
                                    $folder = "uploads/";
                                    $file = "";
                                    if (is_dir($folder)) {
                                        if ($open = opendir($folder)) {
                                            if ($file == "." || $key['photo'] == "..") continue;
                                            $file =  classes\Post::getPhoto($post_id);
                                    ?>
                                            <img src=<?php echo '"uploads/' . $file . '"'; ?> class="picture-feed">
                                    <?php closedir($open);
                                        }
                                    } ?>
                                </a><br>
                                <br>

                                <?php $descrArray = explode(" ", $key['description']); ?>
                                <?php foreach ($descrArray as $word) : ?>
                                    <?php if (!empty($word)) : ?>
                                        <?php if ($word[0] == "#") : ?>
                                            <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo htmlspecialchars($word); ?></a>
                                        <?php else : ?>
                                            <?php echo htmlspecialchars($word); ?>
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