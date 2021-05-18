<?php
    namespace src;

    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();

    $user->setId((int)$currentlyLoggedIn[0]['id']);//$_SESSION
    $user->setIsPrivate(1); 
    $user->privateUser();
    
        $response = [
            "status" => "success",
            "body" => htmlspecialchars($user->getIsPrivate()),
            "user" => htmlspecialchars($user->getId()),
            "message" => "User private"

        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    
        
    
    ?>