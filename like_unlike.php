<?php 
    namespace src;
    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    
    $like = new classes\Like();
    $currentlyLoggedIn = $user->showUser();

    //SET user_id
    $like->setUserID((int)$currentlyLoggedIn[0]['id']);

    //SET post_id
    $like->setPostID($_POST['id']);

    if(!empty($_POST)) {
        if($_POST['like'] == 1){
            $like->addLike();
        }

        if($_POST['like'] == 0){
            $like->removeLike();
        }

        $counterLikes = $like->countLikes();
        echo $counterLikes['count'];
    }



