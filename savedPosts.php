<?php

    namespace src;

    include_once("./header.inc.php");
    spl_autoload_register();

    $user = new classes\User();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();

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

    $bookmarks = new classes\Bookmark();
    $getAllBookmarks = $bookmarks->getSavedPosts();
    var_dump($getAllBookmarks);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planstagram - saved posts</title>
</head>
<body>

    <main>
    
        <div class="container-fluid container-profile clearfix">
        </div>
    
    </main>
    
</body>
</html>
