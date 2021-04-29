<?php

    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $security = new classes\User();
    $security->setUsername($_SESSION['user']);
    $loggedUser = $security->getUsername();
    $currentlyLoggedIn = $security->showUser($loggedUser);

    $likes = new classes\Like();
    $likes->setUserID((int)$currentlyLoggedIn[0]['id']);
    $loggedInId = $likes->getUserID();

    if(!empty($_GET['id'])){

        // WE COLLECT HERE THE INFORMATION FOR THE SPECIFIC POST, WITH THE ID
        $post_id = $_GET['id'];
        $getPost = new classes\Post();

        $postsD = $getPost->getPostDetail($post_id);
        // var_dump($postsD);
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
                    <img src="./user_avatar/<?php echo $post['avatar'] ?>" class="profile-pic-feed">
                </a>
            </div>
            <div class="col-6">
                <a href="profile.php?id=<?php echo $post["id"]; ?>"><span
                        class="profile-name"><?php echo $post["username"]?></span></a><br>
                <a href="#" class="profile-location"><?php echo $post["location"]?></a>
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
                                        <div class="dropdown-menu dropdown-left-manual" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#">Copy link</a>
                                            <a class="dropdown-item" href="#">Share</a>
                                            <?php if($loggedUser == $post['username']): ?>
                                                <a class="dropdown-item" href="#">Delete post</a>
                                            <?php elseif($loggedUser != $post['username']): ?>
                                                <a class="dropdown-item" href="#">Report</a>
                                            <?php endif; ?>
                                        </div>
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

        <!--like/unlike-->
        <div class="row row-third">
            <?php $isLikedbyUser = $likes->isLiked($loggedInId, $post_id); ?>
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

        <div class="row row-fourth">
            <div class="col-12">
                <p><span class="profile-name"><?php echo $post["username"]?></span>
                    <?php $descrArray = explode(" ", $post['description']);?>
                    <?php foreach($descrArray as $word): ?>
                    <?php if (!empty($word)) : ?>
                        <?php if($word[0] == "#"): ?>
                        <a href="results.php?tag=<?php echo str_replace("#", "", $word); ?>" name="tag"
                            class="tags-post"><?php echo  $word;?></a>
                        <?php else: ?>
                        <?php echo  $word; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </p>

                <?php endforeach; ?>
                </p>

            </div>
        </div>

        <div class="row row-fifth">
            <div class="col-12">
                <p class="reaction"><span class="profile-name">Eduard Manet </span>Proin ullamcorper feugiat eros, sit
                    amet accumsan tellus cursus vitae. Etiam feugiat tristique ante, luctus feugiat risus ultrices ut!
                </p>
            </div>
        </div>

        <div class="row row-sixth">
            <div class="col-12">
                <p class="timing-feed"><?php echo $post["postedDate"]?></p>
            </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>

</html>