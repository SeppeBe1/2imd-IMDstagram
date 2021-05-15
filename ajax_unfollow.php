<?php
    namespace src;

    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();

    
            //new follower
            $f = new classes\Follow();
            $f->setIsFollowing($_POST['isFollowing']);
            $f->setIsFollower((int)$currentlyLoggedIn[0]['id']);//$_SESSION

            $f->unfollow();
            ?>