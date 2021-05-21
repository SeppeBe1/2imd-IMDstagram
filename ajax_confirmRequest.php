<?php
    namespace src;

    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    $user->setUsername($_SESSION['user']);
    $currentlyLoggedIn = $user->showUser();
 

    if (!empty($_POST)){
        
       
            //new follower
            $f = new classes\Follow();
            $f->setIsFollower($_POST['isFollower']);
            $f->setIsFollowing((int)$currentlyLoggedIn[0]['id']);//$_SESSION
            $f->setStatus("following"); 

            $f->updateStatus();
            if ($f->updateStatus()){
                $response = [
                    "status" => "success",
                    "following" => htmlspecialchars($f->getIsFollowing()),
                    "follower" => htmlspecialchars($f->getIsFollower()),
                    "state" => htmlspecialchars($f->getStatus()),
                    "message" => "CONFIRMED"
        
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            
            }else {
                $response = [
                    "status" => "error",
                    "following" => htmlspecialchars($f->getIsFollowing()),
                    "follower" => htmlspecialchars($f->getIsFollower()),
                    "state" => htmlspecialchars($f->getStatus()),
                    "message" => "GEEN CONFIRM"
        
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
                
            ?>