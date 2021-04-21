<?php 
    namespace src;
    spl_autoload_register(); 
    
    $security = new classes\User();
    $security->onlyLoggedInUsers();
    $security->setUsername($_SESSION['user']);
    $loggedUser = $security->getUsername();
    
    $likeTest = new classes\Like();
    $currentlyLoggedIn = $security->showUser($loggedUser);
    //SET user_id
    $likeTest->setUserID((int)$currentlyLoggedIn[0]['id']);
    $loggedInId = $likeTest->getUserID();

    //SET post_id
    $likeTest->setPostID($_POST['id']);
    $post_id = $likeTest->getPostID();



    if(!empty($_POST)) {
        if($_POST['like'] == 1){
            $likeTest->addLike($loggedInId, $post_id);
        }

        if($_POST['like'] == 0){
            $likeTest->removeLike($loggedInId, $post_id);
        }

        $counterLikes = $likeTest->countLikes($post_id);
        echo $counterLikes['count'];
    }



