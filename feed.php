<?php

namespace src;

include_once("./header.inc.php");
spl_autoload_register();

$user = new classes\User();
$user->setUsername($_SESSION['user']);
$currentlyLoggedIn = $user->showUser();

// LOOP FOR POSTS
$post = new classes\Post();
$allPosts = $post->getAllPosts();

$like = new classes\Like();
$like->setUserID((int)$currentlyLoggedIn[0]['id']);

if(!empty($_POST['deletePost'])){
    $post = new classes\Post();
    $post->deletePost($_POST['post-id']);
}

if(!empty($_POST['reportPost'])){
    echo "report" . $_POST['post-id']; // TEST
}

if(!empty($_POST['banUser'])){
    echo "ban" . $_POST['post-id']; //functie insteken die de user bant om in te loggen
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
    <title>Plantstagram - feed</title>
</head>

<body>
    <main>
        <!-- START VAN LOOP-->
        <?php foreach ($allPosts as $post) : ?>
        <?php
            $like->setPostID($post['id']);
            $post_id = $like->getPostID();
        ?>

        <div class="container post-post">
            <div class="row row-first">
                <div class="col-2">
                    <a href="profile.php?username=<?php echo $post['username']; ?>">
                        <img src="./user_avatar/<?php echo $post['avatar'] ?>" class="profile-pic-feed rounded-circle">
                    </a>
                </div>
                <div class="col-6">
                    <a href="profile.php?username=<?php echo $post['username']; ?>"><span
                            class="profile-name"><?php echo $post['username'] ?></span></a><br>
                    <a href="results.php?location=<?php echo $post['location']; ?>" class="profile-location"
                        name="location"><?php echo $post['location'] ?></a>
                </div>
                <div class="col-3">
                    <div class="row">
                        <a href="#" class="unfollow-button">Unfollow</a>
                    </div>
                </div>


                <div class="col-1">

                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown">
                                        <img src="../2imd-IMDstagram/img/icons/nav-circle.png" class="toggler">
                                    </a>

                                    <form method="post">
                                        <input type="text" hidden value="<?php echo $post['id']; ?>" name="post-id">
                                        <div class="dropdown-menu dropdown-left-manual"
                                            aria-labelledby="navbarDropdown">
                                            <?php if($user->getUsername() == $post['username']): ?>
                                            <input class="dropdown-item" type="submit" name="deletePost" value="Delete">
                                            <?php elseif($user->getUsername() != $post['username']): ?>
                                            <input class="dropdown-item" type="submit" name="reportPost" value="Report">
                                            <?php //elseif($user == admin (functie die bekijkt of de ingelogde user admin is)) ?>
                                            <!--<input class="dropdown-item" type="submit" name="banUser" value="Ban user">-->
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </li>
                            </ul>

                    </nav>

                </div>
            </div>

            <div class="row row-second">
                <div class="col-12">
                    <?php 
                    $folder = "uploads/";
                    $file = "";
                     if (is_dir($folder)) {
                        if ($open = opendir($folder)) {
                            if ($file == "." || $post['photo'] == "..") continue;
                            $file =  classes\Post::getPhoto($post_id);
                            ?>
                    <img src=<?php echo '"uploads/' . $file . '"'; ?> class="picture-feed">
                    <?php closedir($open);
                        }
                    } ?>
                </div>
            </div>

            <!--like/unlike-->
            <div class="row row-third">
                <?php $isLikedbyUser = $like->isLiked(); ?>
                <div class="col-1">
                    <img src="./img/icons/<?php if (!empty($isLikedbyUser)) {echo "heart";} else {echo "heart-outlines";} ?>.svg"
                        class="icon-feed like-status <?php if (!empty($isLikedbyUser)) { echo "unlike"; } else { echo "like";} ?>"
                        data-id=<?php echo $post['id']; ?>>
                </div>

                <!--count like-->
                <?php $countLikes = $like->countLikes(); ?>
                <div class="col-1">
                    <span id="show_like">
                        <p class="number-feed likescount" data-id="<?php echo $post['id']; ?>">
                            <?php echo $countLikes['count']; ?>
                        </p>
                    </span>
                </div>

                <!--comments-->
                <div class="col-1">
                    <a href="#"><img src="./img/icons/chat.svg" class="icon-feed"></a>
                </div>
                <div class="col-1">
                    <p class="number-feed">1</p>
                </div>

            </div>

            <div class="row row-fourth">
                <div class="col-12">
                    <p><span class="profile-name"><?php echo $post['username']; ?></span>
                        <!--DESCRIPTION + HASHTAGS -->
                        <?php $descrArray = explode(" ", $post['description']); ?>
                        <?php foreach ($descrArray as $word) : ?>
                        <?php if (!empty($word)) : ?>
                        <?php if ($word[0] == "#") : ?>
                        <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag"
                            class="tags-post"><?php echo htmlspecialchars($word); ?></a>
                        <?php else : ?>
                        <?php echo htmlspecialchars($word); ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>

            <div class="row row-sixth">
                <div class="col-12">
                    <p class="timing-feed"><?php echo $post['postedDate'] ?></p>
                </div>
            </div>

            <form action="feed.php">
                <div class="row row-seventh">
                    <div class="col-10">

                        <!-- <input type="text" id="comment-input" name="comment-input" placeholder="Place a comment" size='35'> -->
                        <textarea rows="auto" cols="45" class="comment-input" id="comment-input" name="comment-input"
                            placeholder="Place a comment"></textarea>
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
    </main>
    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/feed.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>