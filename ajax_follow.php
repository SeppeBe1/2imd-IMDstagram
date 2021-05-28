<?php
    namespace src;

    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();
 

    // if (!empty($_POST)){
        
       
    //         //new follower
    //         $f = new classes\Follow();
    //         $f->setIsFollowing($_POST['isFollowing']);
    //         $f->setIsFollower((int)$currentlyLoggedIn[0]['id']);//$_SESSION
    //         $f->setStatus("following"); 

    //         $f->follow();
            
    //             $response = [
    //                 "status" => "success",
    //                 "body" => htmlspecialchars($c->getIsFollowing()),
    //                 "post_Id" => htmlspecialchars($c->getIsFollower()),
    //                 "user" => htmlspecialchars($c->getStatus()),
    //                 "date" => htmlspecialchars(date("Y-m-d H:i:s")),
    //                 "message" => "Follow saved"
        
    //             ];
        
    //             header('Content-Type: application/json');
    //             echo json_encode($response);
    //         } 
           

    if (!empty($_POST)){
        
       
        //new follower
        $f = new classes\Follow();
        $f->setIsFollowing($_POST['isFollowing']);
        $f->setIsFollower((int)$currentlyLoggedIn[0]['id']);//$_SESSION
        $f->setStatus("following"); 

        $f->follow();
        
            $response = [
                "status" => "success",
                "body" => htmlspecialchars($c->getIsFollowing()),
                "post_Id" => htmlspecialchars($c->getIsFollower()),
                "user" => htmlspecialchars($c->getStatus()),
                "date" => htmlspecialchars(date("Y-m-d H:i:s")),
                "message" => "Follow saved"
    
            ];
    
            header('Content-Type: application/json');
            echo json_encode($response);
        } 
?>