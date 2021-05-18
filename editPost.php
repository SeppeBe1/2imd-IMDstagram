<?php

    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $user = new classes\User();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();

    $likes = new classes\Like();
    $likes->setUserID((int)$currentlyLoggedIn[0]['id']);

    $posts = new classes\Post();

    // INFORMATION OF ID TO EDIT THE POST
    if(!empty($_GET['id'])){
        $post_id = $_GET['id'];
        $getPost = new classes\Post();

        $postsD = $getPost->getPostDetail($post_id);
    

        if(!empty($_POST['deletePost'])){
            $post = new classes\Post();
            $post->deletePost($_POST['post-id']);
        }

        if(!empty($_POST['update'])){
            $post = new classes\Post();

            try{
                $post->changeDescription($_POST['description'], $post_id);
                $successMessage = true;
                header("Refresh:3");
            }catch(\Throwable $error) {
                // $error = $error->getMessage();
                $errorMessage = true;

            }
        }
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

    <?php if($user->getUsername() == $post['username']) : ?>    


    <div class="container post-post">

        <!-- MESSAGES ERROR / SUCCESS WHEN UPDATING POST -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger">Something went wrong.</div>
        <?php endif; ?>

        <?php if (isset($successMessage)) : ?>
            <div class="alert alert-success">Post successfully adjusted</div>
        <?php endif; ?>


        <!-- START OF POST CONTENT -->
        <div class="row row-first">
            <div class="col-2">
                <a href="#">
                    <img src="./user_avatar/<?php echo $post['avatar'] ?>" class="profile-pic-feed">
                </a>
            </div>
            <div class="col-6">
                <a href="profile.php?username=<?php echo $post["username"]; ?>"><span
                        class="profile-name"><?php echo htmlspecialchars($post["username"]); ?></span></a><br>
                        <a href="results.php?location=<?php echo htmlspecialchars($post['location']); ?>" class="profile-location"
                        name="location"><?php echo $post['location'] ?></a>
            </div>
            <div class="col-3">
                <div class="row">
                    <a href="#" class="follow-button">Follow</a>
                </div>
            </div>
            <div class="col-1">

                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                    <img src="../2imd-IMDstagram/img/icons/nav-circle.png" class="toggler">
                                </a>
                                <form method="post">
                                    <input type="text" hidden value="<?php echo $_GET['id']; ?>" name="post-id">
                                    <div class="dropdown-menu dropdown-left-manual" aria-labelledby="navbarDropdown">
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

                <?php $folder = "uploads/";
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
            <?php $isLikedbyUser = $likes->isLiked($likes->getUserID(), $post_id); ?>
            <div class="col-1">
                <img src="./img/icons/<?php if (!empty($isLikedbyUser)) {echo "heart";} else {echo "heart-outlines";} ?>.svg"
                    class="icon-feed like-status <?php if (!empty($isLikedbyUser)) { echo "unlike"; } else { echo "like";} ?>"
                    data-id=<?php echo $post['id']; ?>>
            </div>

            <!--count likes-->
            <?php $countLikes = $likes->countLikes($post_id); ?>
            <div class="col-1">
                <span id="show_like">
                    <p class="number-feed likescount" data-id="<?php echo $post['id']; ?>">
                        <?php echo $countLikes['count']; ?>
                    </p>
                </span>
            </div>

            <div class="col-1">
                <a href="#"><img src="./img/icons/chat.svg" class="icon-feed"></a>
            </div>
            <div class="col-1">
                <p class="number-feed">1</p>
            </div>

        </div>
        <form action="" method="post">
            <div class="row row-fourth">
                <div class="col-12">
                    <p><span class="profile-name"><?php echo $post["username"]?></span>
                        <?php $descrArray = explode(" ", $post['description']);?>
                        <?php foreach($descrArray as $word): ?>
                            <?php if (!empty($word)) : ?>
                                <?php if($word[0] == "#"): ?>
                                    <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag"
                                        class="tags-post"><?php echo htmlspecialchars($word);?></a>
                                <?php else: ?>
                                        <?php echo htmlspecialchars($word); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>
                    </p>

                    <textarea rows="4" cols="70" name="description"><?php echo htmlspecialchars( $post['description']); ?></textarea>
                    <a><input  type="submit" name ="update" value="update" class="btn follow-button"></button></a>

                </div>
            </div>
        </form>

        <div class="row row-fifth">
            <div class="col-12">
                <p class="reaction"><span class="profile-name">Eduard Manet </span>Proin ullamcorper feugiat eros, sit
                    amet accumsan tellus cursus vitae. Etiam feugiat tristique ante, luctus feugiat risus ultrices ut!
                </p>
            </div>
        </div>

        <div class="row row-sixth">
            <div class="col-12">
                    <p class="timing-feed"><?php echo $posts->humanTiming($post_id); ?> ago</p>
            </div>
        </div>

    </div>

    <?php else : ?>
        <div class="container post-post">
            <div class="alert alert-warning" role="alert">
                Access denied to this page. You will be redirected to the feed.
            </div>
        </div>
                
        <?php header('Refresh: 3; URL=index.php');?>

    <?php endif ; ?>

    <?php endforeach; ?>


    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/feed.js"></script>

</body>

</html>