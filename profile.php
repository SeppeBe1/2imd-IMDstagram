<?php 
    namespace src;
    spl_autoload_register();
    include_once("./header.inc.php");

    $user = new classes\User();
    $post = new classes\Post();

    // TO GET ID FROM URL
    if(!empty($_GET['username'])){
        $username = $_GET['username'];

        $users = $user->getUsernameFrom($username);
        $user_id = $users[0]['id'];
        $postsUserResults = $post->getPostsUser($user_id);
        
        // STACKING OF THE BOOTSTRAP DIVS IN 3 COLUMNS
        $numberOfColumns = 3;
        $bootstrapColWidth = 12 / $numberOfColumns ;
        $arrayChunks = array_chunk($postsUserResults, $numberOfColumns);
    }

    if(!empty($_GET["username"])){
        $usernameUrl = $_GET["username"];
        $loggedinUser = $user->getUsernameFrom($usernameUrl);
    }

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

    <script src="https://kit.fontawesome.com/a7dc01cef9.js" crossorigin="anonymous"></script>

    <title>Profile</title>
    
</head>

<body>
    <main>
    <?php foreach($users as $user): ?>
        <div class="container container-profile clearfix">
            
            <div class="row row-first">
                <div class="col-3 col-lg-4 ">
                    <div class="avatar">
                        <a href="#">
                            <img src="./user_avatar/<?php echo $user['avatar'] ?>" class="profile-pic-profile rounded-circle">
                        </a>
                    </div>
                </div>

                <div class="col-5 col-lg-5 profile-about">
                    <p><span class="profile-name"><?php echo $user["username"]?></span></p><br>
                    <p class="bio"><?php echo $user["bio"]?></p>
                </div>

                <!-- EDIT BTN WEG WANNEER IK KIJK NAAR ANDER PROFIEL -->
                <?php if($_SESSION['user'] == $_GET['username']): ?>
                    <div class="col-4 col-lg-3">
                        <a href="profileEdit.php" class="btn edit-btn">Edit profile</a>
                    </div>
                <?php endif; ?>
            </div>
            

            <div class="container-follow ">
                <div class="row ">
                    
                    <div class="col-4  text-center follow">
                        <h7 class="number-profile mb-0 d-block">10</h7><small class="text-muted">
                            Posts</small>
                    </div>

                    <div class="col-4  text-center follow">
                        <h7 class="number-profile mb-0 d-block">182</h7><small class="text-muted">Followers</small>
                    </div>

                    <div class="col-4  text-center follow">
                        <h7 class="number-profile mb-0 d-block">320</h7><small class="text-muted">Following</small>
                    </div>
                </div>
                
                <div class="row ">
                    <?php if($_SESSION['user'] != $_GET['username']): ?>
                        <div class="col-sm-12  text-center follow">
                            <!-- FOLLOW BTN WEG WANNEER IK KIJK NAAR EIGEN PROFIEL -->
                            <a href="#" class="float-left btn btn-follow ">Follow</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>     
        </div>
        <?php endforeach ;?>


        <!-- LOOPEN OVER POSTS !-->

        <div class="container-fluid container-gallery">
            <?php foreach($arrayChunks as $postsUserResults) : ?>
                    <div class="row">
                        <?php foreach($postsUserResults as $post): ?>
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
                                                <img src= <?php echo '"uploads/' . $file . '"'; ?> class="imgs-profile">
                                                <?php closedir($open);
                                            }
                                        } ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ;?>
                    </div>
            <?php endforeach ;?>
        </div>
            

    </main>

</body>
</html>