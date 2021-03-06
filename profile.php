<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $user = new classes\User();
    $posts = new classes\Post();

    // TO GET ID FROM URL
    if(!empty($_GET['username'])){
        $username = $_GET['username'];

        $users = $user->getUsernameFrom($username);
        $user_id = $users[0]['id'];
        $postsUserResults = $posts->getPostsUser($user_id);
        
        // STACKING OF THE BOOTSTRAP DIVS IN 3 COLUMNS
        $numberOfColumns = 3;
        $bootstrapColWidth = 12 / $numberOfColumns ;
        $arrayChunks = array_chunk($postsUserResults, $numberOfColumns);
    }

    if(!empty($_GET["username"])){
        $usernameUrl = $_GET["username"];
        $loggedinUser = $user->getUsernameFrom($usernameUrl);
    }

    $user = new classes\User();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();
   
    $userId = $_GET["username"];
    
    //FOLLOW

    $follow = new classes\Follow();
    $follow->setIsFollower((int)$currentlyLoggedIn[0]['id']);

 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style-feed.css">
    <link rel="stylesheet" href="css/style-profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cssgram/0.1.10/cssgram.min.css">

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>

    <title>Profile</title>

</head>

<body>
    <main>
        <?php foreach ($users as $user) : ?>
            <?php
            $follow->setIsFollowing($user['id']);
            $userid = $follow->getIsFollowing();
            ?>

            <div class="container-fluid container-profile clearfix">

                <div class="row row-first">
                    <div class="col-3">
                        <div class="avatar">
                            <a href="#">
                                <img src="./user_avatar/<?php echo htmlspecialchars($user['avatar']); ?>" class="profile-pic-profile rounded-circle">
                            </a>
                        </div>
                    </div>

                    <div class="col-5 profile-about">
                        <p><span class="profile-name"><?php echo htmlspecialchars($user["username"]); ?></span></p><br>
                        <p class="bio"><?php echo htmlspecialchars($user["bio"]); ?></p>
                    </div>

                    <!-- EDIT BTN WEG WANNEER IK KIJK NAAR ANDER PROFIEL -->
                    <?php if ($_SESSION['user'] == $_GET['username']) : ?>
                        <div class="col-4 col-lg-4">
                            <a href="profileEdit.php" class="btn edit-btn">Edit profile</a>
                            <a href="savedPosts.php?username=<?php echo htmlspecialchars($user['username']);?>" class="btn edit-btn">Saved posts</a>



                        </div>
                    <?php endif; ?>
                </div>


                <div class="container-follow ">
                    <div class="row ">

                        <?php $countPosts = $posts->countPostsUser($user_id); ?>
                        <div class="col-4  text-center follow">
                            <h7 class="number-profile mb-0 d-block"><?php echo $countPosts['count'] ; ?></h7><small class="text-muted">
                                Posts</small>
                        </div>

                        <?php $countFollowers = $follow->countFollowers(); ?>
                        <div class="col-4  text-center follow">
                            <a href="followers.php?follower=<?php echo htmlspecialchars($user['username']);?>" name="follower">
                                <h7 class="number-profile mb-0 d-block"><?php echo $countFollowers['count'] ; ?></h7><small class="text-muted">Followers</small>
                            </a>
                        </div>

                        <?php $countFollowing = $follow->countFollowing(); ?>
                        <div class="col-4  text-center follow">
                            <a href="following.php?following=<?php echo htmlspecialchars($user['username']);?>" name="following">
                                <h7 class="number-profile mb-0 d-block"><?php echo $countFollowing['count'] ; ?></h7><small class="text-muted">Following</small>
                            </a>
                        </div>
                    </div>

                    <div class="row ">
                        <?php if ($_SESSION['user'] != $_GET['username']) : ?>
                            <?php $isFollowing = $follow->isFollowing(); ?>
                            <?php $isRequested = $follow->isRequested(); ?>
                            
                            <?php $isPrivate = classes\User::isPrivateUser($user_id); ?>
                            
                                <?php if (!empty($isFollowing)):?>
                                    <div class="col-sm-12  text-center follow">
                                    <!-- FOLLOW BTN WEG WANNEER IK KIJK NAAR EIGEN PROFIEL -->
                                    <a href="#" class="float-left btn btn-unfollow followBtn" data-followid="<?php echo $user_id ?>">Unfollow</a>
                                    </div>
                                
                                <?php elseif (!empty($isRequested)):?>
                                    <div class="col-sm-12  text-center follow">
                                        <!-- Requested -->
                                        <a href="#" class="float-left btn btn-requested requestBtn followBtn " data-followid="<?php echo $user_id ?>">Requested</a>
                                    </div>
                                
                                <?php elseif (!empty($isPrivate)):?>
                                    <div class="col-sm-12  text-center follow">
                                        <!-- Private-->
                                        <a href="#" class="float-left btn btn-sendRequest requestBtn followBtn " data-followid="<?php echo $user_id ?>">Send request</a>
                                    </div>

                                <?php else:?> 
                                    <div class="col-sm-12  text-center follow">
                                        
                                        <a href="#" class="float-left btn btn-follow followBtn" data-followid="<?php echo $user_id ?>">Follow</a>
                                    </div>  
                                <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>


        <!-- LOOPEN OVER POSTS !-->

        <div class="container-fluid container-gallery">
            <?php foreach ($arrayChunks as $postsUserResults) : ?>
                <div class="row">
                <?php $isPrivate = classes\User::isPrivateUser($user_id); ?>
                
                    <?php if ( $isPrivate == false|| !empty($isFollowing) || $_SESSION['user'] == $_GET['username']):?>

                        <?php foreach ($postsUserResults as $post) : ?>
                            <div class="col-4">
                                <div class="square-image">
                                    <a href="postDetail.php?id=<?php echo $post['id']; ?>">
                                        <?php
                                            $folder = "uploads/";
                                            $file = "";
                                            if (is_dir($folder)) {
                                                if ($open = opendir($folder)) {
                                                    if ($file == "." || $post['photo'] == "..") continue;
                                                    $file =  classes\Post::getPhoto($post['id']);
                                                    ?>
                                                    <img src=<?php echo '"uploads/' . $file . '"'; ?> class=<?php echo '" img-thumbnail img-responsive ' . $posts->getSelectedFilter($post["filter_id"]) . '"'; ?>>

                                            <?php closedir($open);
                                                }
                                        } ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif ;?>
                </div>
            <?php endforeach; ?>
        </div>


    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/follow.js"></script>
    <script src="js/sendRequest.js"></script>

</body>

</html>