<?php
    namespace src;

    spl_autoload_register(); 
    
    $user = new classes\User();
    $user->onlyLoggedInUsers();
    
 

    if (!empty($_POST)){
        
       
            //new comment
            $c = new classes\Comment();
            $c->setPostId($_POST['postId']);
            $c->setText($_POST['text']);
            $c->setUserId(12); //$_SESSION
            
            date_default_timezone_set('Europe/Brussels');
            $c->setCommentDate(getdate());
        

            $c->saveC();
            
                $response = [
                    "status" => "success",
                    "body" => htmlspecialchars($c->getText()),
                    "post_Id" => htmlspecialchars($c->getPostId()),
                    "user" => ($c->getUserId()),
                    "date" => htmlspecialchars(date("Y-m-d H:i:s")),
                    "message" => "Comment saved"
        
                ];
        
                header('Content-Type: application/json');
                echo json_encode($response);
            }
            ?>
   