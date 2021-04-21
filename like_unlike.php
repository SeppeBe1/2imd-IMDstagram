<?php 
    namespace src;
    spl_autoload_register(); 
    
    $security = new classes\User();
    $security->onlyLoggedInUsers();

    $currentlyLoggedIn = $security->showUser($_SESSION['user']);
    
    $loggedInId = (int)$currentlyLoggedIn[0]['id'];
    $likeTest = new classes\Like();

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



