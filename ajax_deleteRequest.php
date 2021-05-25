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

            $f->deleteRequest();
            if ($f->deleteRequest()){
                $response = [
                    "status" => "success",
                    "following" => htmlspecialchars($f->getIsFollowing()),
                    "follower" => htmlspecialchars($f->getIsFollower()),
                    "message" => "Request deleted"
        
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            
            }else {
                $response = [
                    "status" => "error",
                    "following" => htmlspecialchars($f->getIsFollowing()),
                    "follower" => htmlspecialchars($f->getIsFollower()),
                    "message" => "Niet gedelete"
        
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
                
            ?>