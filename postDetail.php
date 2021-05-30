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
$postID = null;

if (!empty($_GET['id'])) {
    // WE COLLECT HERE THE INFORMATION FOR THE SPECIFIC POST, WITH THE ID
    $post_id = $_GET['id'];
    $postsD = $posts->getPostDetail($post_id);
}

if (!empty($_POST['deletePost'])) {
    $posts->deletePost($_POST['post-id']);
}

if (!empty($_POST['reportPost'])) {
    echo "report" . $_POST['post-id'];
}

if (!empty($_POST['banUser'])) {
    echo "ban" . $_POST['post-id']; //functie insteken die de user bant om in te loggen
}

//COMMENTS

$comments = new classes\Comment();
$comments->setUserId((int)$currentlyLoggedIn[0]['id']);


// BOOKMARK
$bookmark = new classes\Bookmark();
$bookmark->setUserId((int)$currentlyLoggedIn[0]['id']);

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

    <?php foreach ($postsD as $post) : ?>

        <?php
            $comments->setPostID($post['id']);
            $postId = $comments->getPostID();

            $var = $bookmark->setPostId($post_id);
        ?>

        <div class="container post-post">
            <div class="row row-first">
                <div class="col-2">
                    <a href="#">
                        <img src="./user_avatar/<?php echo htmlspecialchars($post['avatar']) ?>" class="profile-pic-feed">
                    </a>
                </div>
                <div class="col-6">
                    <a href="profile.php?username=<?php echo htmlspecialchars( $post["username"]); ?>"><span class="profile-name"><?php echo htmlspecialchars($post["username"]); ?></span></a><br>
                    <a href="results.php?location=<?php echo htmlspecialchars($post['location']); ?>" class="profile-location" name="location"><?php echo $post['location'] ?></a>
                </div>
                <div class="col-3">
                    <!-- empty column for alignment -->  
                </div>
                <!-- toggler for report/edt/delete -->
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
                                            <a href="editPost.php?id=<?php echo $_GET['id'] ?>" type="submit" name="editPost" value="Edit" class="dropdown-item">Edit</a>
                                                
                                            
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
                    <img src=<?php echo '"uploads/' . $file . '"'; ?> class=<?php echo '" picture-feed ' . $posts->getSelectedFilter($post["filter_id"]) . '"'; ?>>
                    <?php closedir($open);
                        }
                    } ?>
                </div>
            </div>

            <!--like/unlike-->
            <div class="row row-third">
                <?php
                $likes->setPostID($post_id);
                $likes->setUserID($post['user_id']);
                ?>
                <?php $isLikedbyUser = $likes->isLiked(); ?>
                <div class="col-1">
                    <img src="./img/icons/<?php if (!empty($isLikedbyUser)) {
                                                echo "heart";
                                            } else {
                                                echo "heart-outlines";
                                            } ?>.svg" class="icon-feed like-status <?php if (!empty($isLikedbyUser)) {
                                                                                                                                                                    echo "unlike";
                                                                                                                                                                } else {
                                                                                                                                                                    echo "like";
                                                                                                                                                                } ?>" data-id=<?php echo $post['id']; ?>>
                </div>

                <!--count likes-->
                <?php $countLikes = $likes->countLikes(); ?>
                <div class="col-1">
                    <span id="show_like">
                        <p class="number-feed likescount" data-id="<?php echo $post['id']; ?>">
                            <?php echo $countLikes['count']; ?>
                        </p>
                    </span>
                </div>

                <!--comments-->
                <div class="col-2 col-md-1">
                        <a href="#"><img src="./img/icons/chat.svg" class="icon-feed"></a>
                </div>
                <div class="col-2 col-md-1">
                    <p class="number-feed">1</p>
                </div>

                <!-- empty col for spacing-->
                <div class="col-2 col-md-6">
                    </div>

                    <!-- bookmark post -->
                    <div class="col-2 col-md-1">
                    <?php $isBookmarked = $bookmark->isBookmarked(); ?>
                        <img src="./img/icons/<?php if(!empty($isBookmarked)){
                                                                        echo "bookmark-fill";
                                                                    } else{
                                                                        echo "bookmark";
                                                                    }
                                                                    ?>.svg " class="icon-feed bookmark-status 
                                                                                <?php if (!empty($isBookmarked)) {
                                                                                            echo "unbookmark";
                                                                                        } else {
                                                                                            echo "bookmark";
                                                                                        } ?>" data-id=<?php echo $post['id']; ?>
                                
                        
                        >
                    </div>

            </div>

            <div class="row row-fourth">
                <div class="col-12">
                    <p><span class="profile-name"><?php echo htmlspecialchars( $post["username"]) ?></span>
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
                    </p>
                </div>
            </div>

            <div class="row row-sixth">
                <div class="col-12">
                    <p class="timing-feed"><?php echo $posts->humanTiming($post_id); ?> ago</p>
                </div>
            </div>

            <!--Show comments-->
            <?php $allComments = $comments->getAllComments($postId);?>
            
            
            <div id="link-comments">
                <a class="link-c linkComments_<?php echo $postId; ?>" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" data-postid="<?php echo $post['id']; ?>">
                    Show comments
                </a>
            </div>
            <!-- <div class="collapse" id="collapseExample"> -->
                <div class="card ">
                    <div class="list comments_list_<?php echo $postId; ?> ">
                    
                            
                        <?php foreach ($allComments as $comment):?>
                            
                        <div class="comments ">
                            <div class="row ">
                            
                                    <div class="col-2 col-sm-1 col-md-1">
                                        <a id="userid"href="profile.php?username=<?php echo $comment['user_id']; ?>">
                                            <img src="./user_avatar/<?php echo htmlspecialchars($comment['avatar']) ?>" class="profile-pic-comment rounded-circle"> <!--rounded maken-->
                                        </a>
                                    </div>

                                    <div class="col-10 col-sm-11 col-md-11">
                                        <div class="comment">
                                        <p class="commenttext"><strong><?php echo htmlspecialchars($comment['username']); ?></strong>
                                        <?php echo htmlspecialchars($comment['commentText'])?></p>  
                                        
                                        <p class="commenttime"><?php echo $comments->timeAgo(($comment['commentDate']))?></p> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                       
                    </div>
                    
                </div>
            <!-- </div> -->
            <div class="newComment_<?php echo $postId; ?> "></div>


            
                <div class="row row-seventh">
                    

                        <!-- <input type="text" id="comment-input" name="comment-input" placeholder="Place a comment" size='35'> -->
                        <div class="post__comments">
                            <div class="post__comments__form">
                                <input type="text"  class="commenttext comment-input" placeholder="Place a comment">
                                <a href="#"  class="btn  comment-button  btnaddComment" data-postid="<?php echo $post['id']; ?>">Place</a>
                            </div>  
                        </div>  
                </div>


            

        </div>
    <?php endforeach; ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="js/feed.js"></script>
    <script src="js/bookmark.js"></script>

</body>

</html>