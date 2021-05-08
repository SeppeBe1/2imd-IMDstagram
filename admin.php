<?php

namespace src;

include_once("./header.inc.php");
spl_autoload_register();

$security = new classes\User();
$security->setUsername($_SESSION['user']);
$loggedUser = $security->getUsername();
$currentlyLoggedIn = $security->showUser($loggedUser);

// LOOP FOR POSTS
$posts = new classes\Post();
$resultsPosts = $posts->getAllPosts();

$likes = new classes\Like();
$likes->setUserID((int)$currentlyLoggedIn[0]['id']);
$loggedInId = $likes->getUserID();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-feed.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Plantstagram - feed</title>
</head>

<body>

    <main>
        <div class="container-fluid container-profile-edit clearfix">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h6 class="fw-bold border-bottom ">Reported posts</h6>
                </div>
            </div>
           

            <!-- START VAN LOOP-->
            <?php foreach ($resultsPosts as $post) : ?>
            <?php
                $likes->setPostID($post['id']);
                $post_id = $likes->getPostID();
            ?>
            <?php if(!$posts->makeHiddenPost($post['id'])) :?>

            <div class="container-fluid post-post  ">
                <div class="row row-first">
                    <div class="col-4">
                        <a href="profile.php?username=<?php echo $post['username']; ?>">
                            <img src="./user_avatar/<?php echo $post['avatar'] ?>" class="profile-pic-feed rounded-circle"> <!--rounded maken-->
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="profile.php?username=<?php echo $post['username']; ?>"><span
                                class="profile-name"><?php echo $post['username'] ?></span></a><br>
                        <a href="results.php?location=<?php echo $post['location']; ?>" class="profile-location" name="location"><?php echo $post['location'] ?></a>
                    </div>
                    


                    <div class="col-2">

                        <nav class="navbar navbar-expand">
                                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        <li class="nav-item ">
                                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                                <img src="../2imd-IMDstagram/img/icons/nav-circle.png" class="toggler">
                                            </a>
                                            <form method="post">
                                                <input type="text" hidden value="<?php echo $post['id']; ?>" name="post-id">
                                                <div class="dropdown-menu dropdown-left-manual"aria-labelledby="navbarDropdown">
                                                    <input class="dropdown-item" type="submit" name="setPost" value="Set post back">
                                                    <input class="dropdown-item" type="submit" name="deletePost" value="Delete post">                   
                                                    <input class="dropdown-item" type="submit" name="banUser" value="Ban user">
                                                    
                                                </div>
                                            </form>
                                            
                                        </li>
                                    </ul>

                            </nav>
                                            
                    </div>
                    

                </div>

                <div class="row row-second">
                    <div class="col-12">
                        <?php $folder = "uploads/";
                        $file = "";
                        if (is_dir($folder)) {
                                if ($open = opendir($folder)) {
                                    if ($file == "." || $post['photo'] == "..") continue;
                                    $file =  classes\Post::getPhoto($post_id);
                                    ?>
                                    <img src= <?php echo '"uploads/' . $file . '"'; ?> class="picture-feed">
                                    <?php closedir($open);
                                }
                            } ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>




    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/feed.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>