<?php

namespace src;

include_once("./header.inc.php");
spl_autoload_register();

$user = new classes\User();
$user->setUsername($_SESSION['user']);
$currentlyLoggedIn = $user->showUser();

// LOOP FOR POSTS
$posts = new classes\Post();
$allPosts = $posts->getAllReportedPosts();

$like = new classes\Like();
$like->setUserID((int)$currentlyLoggedIn[0]['id']);



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
            <?php foreach ($allPosts as $post) : ?>
                <?php if (!$posts->makeHiddenPost($post['id'])) : ?>
                    <div class="container-fluid post-post  ">
                        <div class="row row-first">
                            <div class="col-4">
                                <a href="profile.php?username=<?php echo htmlspecialchars( $post['username']); ?>">
                                    <img src="./user_avatar/<?php echo htmlspecialchars( $post['avatar']); ?>" class="profile-pic-feed rounded-circle">
                                    <!--rounded maken-->
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="profile.php?username=<?php echo htmlspecialchars( $post['username']); ?>"><span class="profile-name"><?php echo htmlspecialchars( $post['username']) ?></span></a><br>
                                <a href="results.php?location=<?php echo htmlspecialchars( $post['location']); ?>" class="profile-location" name="location"><?php echo htmlspecialchars( $post['location']) ?></a>
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
                                                    <div class="dropdown-menu dropdown-left-manual" aria-labelledby="navbarDropdown">
                                                        <input class="dropdown-item setPost" type="submit" name="setPost" data-id="<?php echo $post['id'] ?>" value="Set post back">
                                                        <input class="dropdown-item deletePost" type="submit" name="deletePost" data-id="<?php echo $post['id'] ?>" value="Delete post">
                                                        <input class="dropdown-item banUser" type="submit" data-userId="<?php echo $post['user_id'] ?>" data-postId="<?php echo $post['id'] ?>" name=" banUser" value="Ban user">
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
                                        $file =  classes\Post::getPhoto($post['id']);
                                ?>
                                        <img src=<?php echo htmlspecialchars( 'uploads/' . $file ); ?> class=<?php echo '" picture-feed ' . $posts->getSelectedFilter($post["filter_id"]) . '"'; ?>>
                                <?php closedir($open);
                                    }
                                } ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <p><span class="profile-name"><?php echo htmlspecialchars($post['username']); ?></span>
                                <!--DESCRIPTION + HASHTAGS -->
                                <?php $descrArray = explode(" ", $post['description']); ?>
                                <?php foreach ($descrArray as $word) : ?>
                                    <?php if (!empty($word)) : ?>
                                        <?php if ($word[0] == "#") : ?>
                                            <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag" class="tags-post"><?php echo htmlspecialchars($word); ?></a>
                                        <?php else : ?>
                                            <?php echo htmlspecialchars($word); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </p>
                        </div>

                        <div class="row row-sixth">
                            <div class="col-12">
                                <p class="timing-feed"><?php echo $post['postedDate'] ?></p>
                            </div>
                        </div>
                    </div>

        </div>
    <?php endif; ?>
<?php endforeach; ?>
</div>




    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>