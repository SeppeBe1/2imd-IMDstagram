<?php
    namespace src;

    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();

    $user->setId((int)$currentlyLoggedIn[0]['id']);//$_SESSION
    $user->setIsPrivate(null); 
    $user->privateUserDelete();
    
        $response = [
            "status" => "success",
            "body" => htmlspecialchars($user->getIsPrivate()),
            "user" => htmlspecialchars($user->getId()),
            "message" => "User not private"

        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    
        
    
    ?>