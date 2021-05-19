<?php 
    namespace src;
    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    
    $bookmark = new classes\Bookmark();
    $currentlyLoggedIn = $user->showUser();

    $bookmark->setUserId((int)$currentlyLoggedIn[0]['id']);
    $bookmark->setPostId($_POST['id']);

    if(!empty($_POST)) {
        if($_POST['bookmark'] == 1){
            $bookmark->addBookmark();
        }

        if($_POST['bookmark'] == 0){
            $bookmark->removeBookmark();
        }
    }



