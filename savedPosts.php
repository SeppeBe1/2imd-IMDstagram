<?php

    namespace src;

    include_once("./header.inc.php");
    spl_autoload_register();

    $user = new classes\User();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();

    $posts = new classes\Post();


    if(!empty($_GET['username'])){
        $username = $_GET['username'];
        // var_dump($username);

        $users = $user->getUsernameFrom($username);
        $userId = $users[0]['id'];
        // var_dump($userId);
        // $postsUserResults = $posts->getPostsUser($user_id);
        
        // STACKING OF THE BOOTSTRAP DIVS IN 3 COLUMNS
        $numberOfColumns = 3;
        $bootstrapColWidth = 12 / $numberOfColumns;
        $bookmarks = new classes\Bookmark();
        $getAllBookmarks = $bookmarks->getSavedPosts($userId);
        var_dump($getAllBookmarks);

        $arrayChunks = array_chunk($getAllBookmarks, $numberOfColumns);

    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="css/style-feed.css"> -->
    <link rel="stylesheet" href="css/style-profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cssgram/0.1.10/cssgram.min.css">
    <title>Planstagram - saved posts</title>
</head>
<body>

    <main>
        
        <!-- LOOP ON SAVED IMAGES -->
        <div class="container-fluid container-gallery">
            <?php foreach ($arrayChunks as $getAllBookmarks) : ?>
            
                <div class="row">

                        <?php foreach ($getAllBookmarks as $post) : ?>
                            
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

                </div>
            <?php endforeach; ?>
        </div>
    
    </main>
    
</body>
</html>
