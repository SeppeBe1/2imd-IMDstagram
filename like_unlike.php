<?php 
    namespace src;
    spl_autoload_register(); 
    
    $security = new classes\User();
    $security->onlyLoggedInUsers();
    $security->setUsername($_SESSION['user']);
    $loggedUser = $security->getUsername();
    
    $likeTest = new classes\Like();
    $currentlyLoggedIn = $security->showUser($loggedUser);
    $likeTest->setUserID((int)$currentlyLoggedIn[0]['id']);
    $loggedInId = $likeTest->getUserID();

    if(!empty($_POST)) {
        if($_POST['like'] == 1){
            $likeTest->addLike($loggedInId, $_POST['id']);
        }

        if($_POST['like'] == 0){
            $likeTest->removeLike($loggedInId, $_POST['id']);
        }

        $counterLikes = $likeTest->countLikes($_POST['id']);
        echo $counterLikes['count'];
    }



